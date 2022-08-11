<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanDonor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_warga = DB::table('d_warga')->count();
        $kegiatan = Kegiatan::count();
        $donor = KegiatanDonor::count();
        $total_kegiatan = $kegiatan + $donor;
        $kegiatan_baru = Kegiatan::orderBy('tgl_update', 'desc')->take(2)->get();
        // dd($kegiatan_baru);
        return view('admin.pages.das',compact('total_warga','total_kegiatan','kegiatan_baru'));
    }

    public function warga()
    {
        return view('warga.dashboard');
    }
}
