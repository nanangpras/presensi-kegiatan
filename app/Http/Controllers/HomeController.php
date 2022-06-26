<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
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
        // $distribution = TempDistribute::with('agency')
        //                                 ->groupBy('distribute_target_id')
        //                                 ->selectRaw('*,sum(qty) as jumlah')
        //                                 ->get();
        // return view('home');
        // dd($kegiatan);
        return view('admin.pages.das');
    }

    public function warga()
    {
        return view('warga.dashboard');
    }
}
