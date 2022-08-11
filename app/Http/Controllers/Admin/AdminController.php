<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getCabang(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $cabang = Cabang::orderby('nama','desc')->select('id_cabang','nama')->limit(5)->get();
        }else{
            $cabang = Cabang::orderby('nama','asc')
                                ->select('id_cabang','nama')
                                ->where('nama','like','%'.$search.'%')
                                ->limit(6)
                                ->get();
        }

        $response = array();
        foreach($cabang as $cbg){
            $response[]=array(
                "id" =>$cbg->id_cabang,
                "text" =>$cbg->nama,
            );
        }

        return response()->json($response);
    }

    public function searchNik(Request $request)
    {
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        // $seraching = DB::table('d_warga')->where('nik', 'like','%'.$nik.'%')->get();
        // return response()->json($warga);
        
        $seraching = DB::table('d_warga')
                        ->select('d_warga.*','users.id as user_id','md_cabang.nama as nama_cabang')
                        ->join('users','d_warga.nik', '=','users.nik')
                        ->join('md_cabang','d_warga.id_cabang', '=','md_cabang.id_cabang')
                        ->where(function ($query) use ($nik){
                            if (!empty($nik)) {
                                $query->where('d_warga.nik','like','%'.$nik.'%');
                            }
                        })
                        ->orWhere(function ($query) use ($nama){
                            if (!empty($nama)) {
                                $query->where('d_warga.nama','like','%'.$nama.'%');
                            }
                        })
                        ->orderBy('warga_id','asc')->get();


        return Response($seraching);
    }
}
