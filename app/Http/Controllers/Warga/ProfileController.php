<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\Maisah;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user()->nik;
        $profile = Warga::where('nik',$data)->get();
        
        $id = Warga::where('nik',$data)->first();

        $usaha = Maisah::where('warga_id',$id->warga_id)->get();
        // dd($usaha);
        // $profile = Auth::user()->warga_id;
        // dd($profile);
        return view('warga.pages.profile.data',compact('profile','usaha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $data = Auth::user()->nik;
        $profile = Warga::where('nik',$data)->get();
        $cabang = Cabang::pluck('nama','id_cabang');
        $element = Element::pluck('nama','id');
        // $element = Element::orderBy('nama', 'asc')->get()->toArray();
        // $golda = 
        // dd($element);
        // dd($profile);
        return view('warga.pages.profile.edit',compact('profile','cabang','element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        // dd($request->all());
        $data = $request->all();
        $data = request()->except(['_token','_method']);
        DB::table('d_warga')
                ->where('nik',$nik)
                ->update($data);
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
