<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\ViewPresensi;
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
        $kegiatan = DB::table('d_event')->get();
        return view('admin.pages.kegiatan.index',compact('kegiatan'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        Kegiatan::create($data);
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
