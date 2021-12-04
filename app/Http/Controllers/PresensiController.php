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

            $lastwarga = Warga::where('warga_id', $request->warga_id)->first();
        $lastkegiatan = PresensiKegiatan::where('event_id',$request->event_id)->orderBy('event_id','desc')->first();
            if (empty($warga)) {
                return view('presensi.result-null');
            }else{
                return view('presensi.result', compact('warga', 'event','lastwarga','lastkegiatan'));
            }
            // dd($event,$warga);
        } catch (Exception $th) {
            //throw $th;
            echo "gagal";
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
        $kegiatan = PresensiKegiatan::where('event_id',$request->event_id)->orderBy('event_id','desc')->first();
        // dd($warga,$kegiatan);
        if ($warga && $kegiatan ? $warga && $kegiatan :0) {
            $presensi = new PresensiKegiatan();
            $presensi->id = 0;
            $presensi->event_id = $request->event_id;
            $presensi->warga_id = $request->warga_id;
            $presensi->admin_id = 1;
            $presensi->channel = 'web';
            $presensi->tgl_insert = Carbon::now();
            $presensi->save();
        } else {
            echo"gagal";
        }
        

        // try {
        //     //code...
        //     $presensi = new PresensiKegiatan();
        //     $presensi->id = 0;
        //     $presensi->event_id = $request->event_id;
        //     $presensi->warga_id = $request->warga_id;
        //     $presensi->admin_id = 1;
        //     $presensi->channel = 'web';
        //     $presensi->tgl_insert = Carbon::now();
        //     $presensi->save();
        // } catch (Exception $e) {
        //     //throw $th;
        //     return $e;
        // }




        return redirect()->route('home.presensi');






        // dd($presensi);

    }
}
