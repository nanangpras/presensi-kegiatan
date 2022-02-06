<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use Illuminate\Http\Request;

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
}
