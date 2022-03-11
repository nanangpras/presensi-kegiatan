<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\KegiatanController;
use App\Models\Kegiatan;
use App\Models\KegiatanDonor;
use App\Models\PresensiKegiatan;
use App\Models\PresensiKegiatanDonor;
use App\Models\Warga;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class PresensiController extends Controller
{
    public function index()
    {
        return view('presensi.index');
    }

    public function search(Request $request)
    {
        try {
            //code...
            $s = $request->nik;
            $warga = DB::table('d_warga')
                ->where('nik', 'like', "%" . $s . "%")
                ->first();
            $event = Kegiatan::orderBy('event_id', 'desc')->first();

            $lastwarga = Warga::where('warga_id', $warga->warga_id)->first();
            $lastkegiatan = PresensiKegiatan::where('event_id',$event->event_id)->orderBy('event_id','desc')->first();
            // dd($lastkegiatan,$lastwarga, $event);
            return view('presensi.result', compact('warga', 'event','lastwarga','lastkegiatan'));
            if (empty($warga)) {
                return view('presensi.result-null');
            }elseif ($lastkegiatan->event_id == 0) {
                return view('presensi.result-condition', compact('warga', 'event','lastwarga','lastkegiatan'));
            }elseif ($lastwarga->warga_id = $lastkegiatan->warga_id && $lastkegiatan->event_id = $event->event_id) {
                echo"sudah presensi";
            }else{
                echo"gagal";
            }
            // dd($event,$warga);
        } catch (Exception $e) {
            //throw $th;
            return view('presensi.result-null');
        }
        
    }

    public function presensi(Request $request)
    {
        // dd($request->all());
        // $this->validate($request, [
        //     'warga_id' => 'unique:d_event_reg,warga_id'
        // ]);
        // return view('presensi.result',['data'=>$request]);
        $warga = Warga::where('warga_id', $request->warga_id)->first();
        $kegiatan = Kegiatan::where('event_id',$request->event_id)->orderBy('event_id','desc')->first();
        $presensikegiatan = PresensiKegiatan::where('event_id',$request->event_id)->orderBy('event_id','desc')->first();
        // dd($warga,$kegiatan);
        if ($warga->warga_id && $kegiatan->event_id > 0) {
            $presensi = new PresensiKegiatan();
            $presensi->id = 0;
            $presensi->event_id = $request->event_id;
            $presensi->warga_id = $request->warga_id;
            $presensi->admin_id = 1;
            $presensi->channel = 'web';
            $presensi->tgl_insert = Carbon::now();
            // dd($presensi);
            $presensi->save();
            return view('presensi.sukses');
        } else {
            echo"gagal";
        }

    }

    public function insertPresensi(Request $request)
    {
        $data = Auth::user()->nik;
        $profile = Warga::where('nik',$data)->first();
        $pres = PresensiKegiatan::where([
            ['warga_id',$profile->warga_id],
            ['event_id',$request->event_id],
        ])->exists();
        if ($pres) {
            return Redirect::back()->with('error','Sudah presensi');
        }else{
            $data = new PresensiKegiatan();
            $data->event_id = $request->event_id;
            $data->warga_id = $profile->warga_id;
            $data->user_id = Auth::user()->id;
            $data->keterangan = 'hadir';
            $data->save();
            return Redirect::back()->with('success','Berhasil presensi');
        }
        
        
    }

    public function insertPresensiDonor(Request $request)
    {
        $user = Auth::user()->nik;
        $profile_warga = Warga::where('nik',$user)->first();
        $donor = KegiatanDonor::orderBy('tgl_update','desc')->get();

        $cekpres_kegiatan = PresensiKegiatanDonor::where('warga_id',$profile_warga->warga_id)->get();
        $cekpres = PresensiKegiatanDonor::where('warga_id',$profile_warga->warga_id)->first();
        
        foreach ($donor as $event) {
            $presensi = PresensiKegiatanDonor::where('event_id',$event->event_id)->where('warga_id',$profile_warga->warga_id)->first();
            // $cekwarga = PresensiKegiatanDonor::where('warga_id',$profile_warga->warga_id)->get();
            // $presensi = $event->event_id;
            // dd($presensi);
            // dd($cekwarga);
            if ($presensi == null) {
                $response = new PresensiKegiatanDonor();
                $response->event_id = $request->event_id;
                $response->warga_id = $profile_warga->warga_id;
                $response->admin_id = 1;
                $response->keterangan = 'hadir donor';
                $response->status = 'hadir';
                $response->channel = 'web';
                $response->tgl_insert = Carbon::now();
                $response->save();
                return Redirect::back()->with('success','Berhasil presensi');
            }else {
                return Redirect::back()->with('error','Sudah presensi');
            }

        }

        
        
        // dd($cek);
        // $query = PresensiKegiatanDonor::whereHas('kegiatan',function ($q) use ($profile_warga){
        //     $q->where('warga_id',$profile_warga->warga_id);
        // })->get();

        // $cek = 
        // dd($query);
        

        // if ($query->warga_id  ) {

        //     $data = new PresensiKegiatanDonor();
        //     $data->event_id = $request->event_id;
        //     $data->warga_id = $profile_warga->warga_id;
        //     $data->admin_id = 1;
        //     $data->keterangan = 'hadir donor';
        //     $data->status = 'hadir';
        //     $data->channel = 'web';
        //     $data->tgl_insert = Carbon::now();
        //     $data->save();
        //     return Redirect::back()->with('success','Berhasil presensi');
        // }else{
            
        //     return Redirect::back()->with('error','Sudah presensi');
        // }
    }

    public function presensiDonorDariAdmin(Request $request)
    {
            $data = new PresensiKegiatanDonor();
            $data->event_id = $request->event_id;
            $data->warga_id = $request->warga_id;
            $data->admin_id = 1;
            $data->keterangan = 'hadir donor';
            $data->status = 'belum donor';
            $data->channel = 'web';
            $data->tgl_insert = Carbon::now();
            $data->save();
            if ($data==true) {
                return response()->json([
                    "status"=>"berhasil presensi"
                ]);
            } else {
                return response()->json([
                    "status"=>"gagal presensi"
                ]);
            }
    }

    public function presensiKegiatanDariAdmin(Request $request)
    {
            $data = new PresensiKegiatan();
            $data->event_id = $request->event_id;
            $data->user_id = $request->user_id;
            $data->warga_id = $request->warga_id;
            $data->admin_id = Auth::user()->id;
            $data->keterangan = 'hadir';
            $data->save();
            if ($data==true) {
                return response()->json([
                    "status"=>"berhasil presensi"
                ]);
            } else {
                return response()->json([
                    "status"=>"gagal presensi"
                ]);
            }
    }

    public function changeStatusDonor($id, Request $request)
    {
        
        $change = PresensiKegiatanDonor::findOrFail($id);
        $change->status = $request->status;;
        $change->save();
        if ($change==true) {
            return response()->json([
                "status"=>"berhasil update"
            ]);
        } else {
            return response()->json([
                "status"=>"gagal update"
            ]);
        }
    }
}
