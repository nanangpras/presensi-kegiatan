<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WargaRequest;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $check_admin_cabang     = User::join('d_warga','d_warga.nik','=','users.nik')
                                ->select('d_warga.id_cabang','users.id as id_user','users.role','users.access')
                                ->where('id',Auth::user()->id)
                                ->first();
        if ($check_admin_cabang->access == "cabang" && $check_admin_cabang->role == 'admin') {
            $warga = DB::table('d_warga')
                    ->select('d_warga.*','md_cabang.nama as cabang')
                    ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                    ->where('d_warga.id_cabang',$check_admin_cabang->id_cabang)
                    ->get();
        }else{
            $warga = DB::table('d_warga')
                        ->select('d_warga.*','md_cabang.nama as cabang')
                        ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                        ->get();
        }
                    // dd($warga);
        $cabang = DB::table('md_cabang')
                        ->select('md_cabang.id_cabang','md_cabang.nama',DB::raw('COUNT(d_warga.warga_id) as jumlah_warga'))
                        ->leftJoin('d_warga', 'd_warga.id_cabang','=','md_cabang.id_cabang')
                        ->groupBy('md_cabang.id_cabang','md_cabang.nama')
                        ->get();
                        // dd($cabang);
        return view('admin.pages.warga.data',compact('warga','cabang','check_admin_cabang'));
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
    public function store(WargaRequest $request)
    {
        // $data = $request->all();
        // dd($data);
        $data = Warga::create([
            'nik'           => $request->nik,
            'ektp'          => $request->nik,
            'nama'          => $request->nama,
            'id_cabang'     => $request->id_cabang,
            'alamat'        => $request->alamat,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'gol_darah'     => $request->gol_darah,
            'telp'          => $request->telp,
            'agama'         => $request->agama,
            'perkawinan'    => $request->perkawinan,
            'status_warga'  => $request->status_warga,
            'pendidikan'    => $request->pendidikan,
            // 'element_id' => explode(',', $request->element ?? '7'),
            'element_id'    => implode(',',$request->element)  ?? 7,
            'pekerjaan'     => $request->pekerjaan,
            'lanjutan_warga'=> 1,
        ]);
        // $data = new Warga();
        // $data->nik = $request->nik;
        // $data->ektp = $request->nik;
        // $data->nama = $request->nama;
        // $data->id_cabang = $request->id_cabang;
        // $data->alamat = $request->alamat;
        // $data->tempat_lahir = $request->tempat_lahir;
        // $data->tgl_lahir = $request->tgl_lahir;
        // $data->jenis_kelamin = $request->jenis_kelamin;
        // $data->gol_darah = $request->gol_darah;
        // $data->telp = $request->telp;
        // $data->agama = $request->agama;
        // $data->perkawinan = $request->perkawinan;
        // $data->status_warga = $request->status_warga;
        // $data->pendidikan = $request->pendidikan;
        // // $data->element_id = explode(',', $request->element ?? '7');
        // $data->element_id = implode(',',$request->element)  ?? 7;
        // $data->pekerjaan = $request->pekerjaan;
        // $data->lanjutan_warga = 1;
        // // dd($data);
        // $data->save();

        $user = new User();
        $user->name = $data->nama;
        $user->nik = $data->nik;
        $user->email = $request->email;
        $user->role = 'warga';
        $user->password = Hash::make('234234234');
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
        $element = Element::pluck('nama','id');
        $detailWarga = Warga::join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                            ->join('users','users.nik','=','d_warga.nik')
                            ->select('d_warga.*','md_cabang.nama as nama_cabang','users.access','users.email')
                            ->where('warga_id',$id)->first();
        if ($detailWarga) {
            $user = User::where('nik',$detailWarga->nik)->first();
        }
        return view('admin.pages.warga.detail',compact('detailWarga','user','element'));
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
        if ($request->key == 'updateAkses') {
            $updateAkses = User::where('nik',$id)->first();
            $updateAkses->role = 'admin';
            $updateAkses->access = $request->access;
            $updateAkses->save();

            $element = implode(',',$request->element);
            Warga::where('nik', $id)
            ->update(['element_id' => $element]);

            // $updateWarga = Warga::where('nik',$id)->first();
            // $updateWarga->element_id = implode(',',$request->element);
            // $updateWarga->save();
            return redirect()->back()->with('success','Akses berhasil diupdate');
        }
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
