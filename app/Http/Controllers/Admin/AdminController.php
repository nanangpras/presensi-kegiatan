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
        // $seraching = DB::table('d_warga')->where('nik', 'like','%'.$nik.'%')->get();
        // return response()->json($warga);
        
        $seraching = DB::table('d_warga')->where(function ($query) use ($nik){
            if (!empty($nik)) {
                $query->where('nik','like','%'.$nik.'%');
            }
        })->orderBy('warga_id','asc')->get();

        // $xcess_milks = Excess_milk::where(function ($query) use ($request){                 
        //                     if (!empty($request->search_time)){
        //                     $query->Where('time', 'LIKE', '%' . $request->search_time . '%');
        //                  }
        //             })->orderBy('date','asc')->get;

   return Response($seraching);
    }
}
