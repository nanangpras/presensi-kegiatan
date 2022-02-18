<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warga = DB::table('d_warga')
                    ->select('d_warga.*','md_cabang.nama as cabang')
                    ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                    ->get();
                    // dd($warga);
        $cabang = DB::table('md_cabang')->get();
        return view('admin.pages.warga.data',compact('warga','cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabang = Cabang::pluck('nama','id_cabang');
        $element = Element::pluck('nama','id');
        return view('admin.pages.warga.create',compact('cabang','element'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $data = new Warga();
        $data->nik = $request->nik;
        $data->ektp = $request->nik;
        $data->nama = $request->nama;
        $data->id_cabang = $request->id_cabang;
        $data->alamat = $request->alamat;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->gol_darah = $request->gol_darah;
        $data->telp = $request->telp;
        $data->agama = $request->agama;
        $data->perkawinan = $request->perkawinan;
        $data->status_warga = $request->status_warga;
        $data->pendidikan = $request->pendidikan;
        $data->element_id = $request->element_id;
        $data->pekerjaan = $request->pekerjaan;
        // dd($data);
        $data->save();

        $user = new User();
        $user->name = $data->nama;
        $user->nik = $data->nik;
        $user->email = $data->nik;
        $user->role = 'warga';
        $user->password = Hash::make('234234');
        $user->save();
        
        return redirect()->route('warga.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
