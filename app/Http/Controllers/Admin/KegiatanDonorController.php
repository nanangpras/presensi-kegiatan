<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\KegiatanDonor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanDonorController extends Controller
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
        $donor = KegiatanDonor::all();
        return view('admin.pages.kegiatan.donor.index',compact('donor','cabang','element'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new KegiatanDonor();
        $data->nama = $request->nama;
        $data->tgl_donor_mulai = $request->tgl_donor_mulai;
        $data->lokasi = $request->lokasi;
        $data->maps = $request->maps;
        $data->admin_id = Auth::user()->id;
        $data->tgl_update = Carbon::now();
        // dd($data);
        $data->save();
        return redirect()->route('donor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id)
    {
        $donorpresensi = KegiatanDonor::findOrFail($event_id);
        // dd($donorpresensi);
        return view('admin.pages.kegiatan.donor.presensi',compact('donorpresensi'));
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
