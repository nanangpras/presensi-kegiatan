<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\Kegiatan;
use App\Models\KegiatanDonor;
use App\Models\Maisah;
use App\Models\PresensiKegiatan;
use App\Models\PresensiKegiatanDonor;
use App\Models\User;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        // $seleksi = User::select('video_galleries.*','users.*')
        //                         ->join('video_galleries','video_galleries.user_id', '=' ,'users.id')
        //                         // ->where('users.id','video_galleris.user_id')
        //                         ->get();

        $saya = User::join('d_warga','d_warga.nik','=','users.nik')
                    ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                    ->select('d_warga.*','users.*','md_cabang.nama as cabang')
                    ->where('id',Auth::user()->id)
                    ->first();
        // dd($saya);
        // dd($usaha);
        // $profile = Auth::user()->warga_id;
        // dd($profile);
        return view('warga.pages.profile.data',compact('profile','usaha','saya'));
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

    public function presensi()
    {
        $data = Auth::user()->nik;
        $profile = Warga::where('nik',$data)->first();
        // dd($profile);
        $presensi = Kegiatan::
                        where([
                                ['id_cabang',$profile->id_cabang],
                                ['element_id',$profile->element_id]
        ])->get();
        // dd($presensi);

        $donor = KegiatanDonor::orderBy('tgl_update','asc')->first();
        // dd($donor);

        return view('warga.pages.presensi.data',compact('presensi','donor'));
    }

    public function changePassword($id)
    {
        $user = User::findOrFail($id);
        return view('warga.pages.profile.update-password',compact('user'));
    }

    public function updatePasswordUser(Request $request, User $user)
    {
        $request->validate([
            'password'                => 'required|min:8',
            'password_baru'           => 'required|min:8|required_with:konfirmasi_password|same:konfirmasi_password',
            'konfirmasi_password'     => 'required|min:8'
        ]);

        if (Hash::check($request->password, $user->password)) {
            if ($request->password == $request->konfirmasi_password) {
                return redirect()->back()->with('error','Password gagal diperbarui, tidak ada yang berubah pada kata sandi');
            } else {
                $user->password = Hash::make($request->konfirmasi_password);
                $user->save();
                return redirect()->route('profile.index')->with('success','Password berhasil diperbarui');
            }
        } else {
            return redirect()->back()->with('error','Password tidak cocok dengan kata sandi lama');
        }
    }
}
