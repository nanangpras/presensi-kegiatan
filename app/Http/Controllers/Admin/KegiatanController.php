<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanRequest;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\Kegiatan;
use App\Models\ViewPresensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = Cabang::pluck('nama','id_cabang');
        $element = Element::pluck('nama','id');
        $kegiatan = DB::table('d_event')->get();
        return view('admin.pages.kegiatan.data',compact('kegiatan','cabang','element'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KegiatanRequest $request)
    {
        
        // $data = $request->all();
        // dd($data);
        $data = new Kegiatan();
        $data->nama = $request->nama;
        $data->id_cabang = $request->id_cabang;
        $data->element_id = $request->element_id;
        $data->lokasi = $request->lokasi;
        $data->maps = $request->maps;
        $data->tgl_update = Carbon::now();
        $data->tgl_event_mulai = $request->tgl_event_mulai;
        $data->tgl_event_akhir = $request->tgl_event_akhir;
        $data->save();
        return redirect()->route('kegiatan.index');
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

    public function summary()
    {
        // $laporanpresensi = ViewPresensi::select("*")->get()->toArray();
        // dd($laporanpresensi);
        $laporanpresensi = DB::table('d_event_reg')
                            ->select('d_warga.*','d_event.nama as kegiatan','md_cabang.nama as nama_cabang')
                            ->join('d_warga','d_warga.warga_id','=','d_event_reg.warga_id')
                            ->join('d_event','d_event.event_id','=','d_event_reg.event_id')
                            ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                            // ->orderBy('d_event_reg.event_id','desc');
                            ->get();
                            // dd($laporanpresensi);
        return view('admin.pages.laporan.kegiatan',compact('laporanpresensi'));
    }
}
