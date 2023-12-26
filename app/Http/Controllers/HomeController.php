<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\KegiatanDonor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $check_admin_cabang = Auth::user();
        $cabang_admin       = User::join('d_warga','d_warga.nik','=','users.nik')
                            ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                            ->select('md_cabang.nama as nama_cabang','md_cabang.id_cabang','users.id as id_user')
                            ->where('id',Auth::user()->id)
                            ->first();
        if ($check_admin_cabang->access == "cabang" && $check_admin_cabang->role == 'admin') {
            $total_warga    = DB::table('d_warga')->where('id_cabang',$cabang_admin->id_cabang)->count();
            $kegiatan       = Kegiatan::where('id_cabang',$cabang_admin->id_cabang)->count();
            $donor          = KegiatanDonor::where('admin_id',$cabang_admin->id_user)->count();
            $total_kegiatan = $kegiatan + $donor;
            $kegiatan_baru  = Kegiatan::where('id_cabang',$check_admin_cabang->id_cabang)->orderBy('tgl_update', 'desc')->take(2)->get();
            // return view('admin.pages.das',compact('total_warga','total_kegiatan','kegiatan_baru','check_admin_cabang','cabang_admin'));
        }else{
            $total_warga    = DB::table('d_warga')->count();
            $kegiatan       = Kegiatan::count();
            $donor          = KegiatanDonor::count();
            $total_kegiatan = $kegiatan + $donor;
            $kegiatan_baru  = Kegiatan::orderBy('tgl_update', 'desc')->take(2)->get();
        }
        // dd($kegiatan_baru);
        return view('admin.pages.das',compact('total_warga','total_kegiatan','kegiatan_baru','check_admin_cabang','cabang_admin'));
    }

    public function warga()
    {
        return view('warga.dashboard');
    }
}
