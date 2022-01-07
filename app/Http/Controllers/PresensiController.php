<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\KegiatanController;
use App\Models\Kegiatan;
use App\Models\PresensiKegiatan;
use App\Models\Warga;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        
        // return view('presensi.sukses');
        // return redirect()->route('home.presensi');






        // dd($presensi);

    }
}
