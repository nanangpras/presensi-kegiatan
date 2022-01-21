<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Maisah;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaisahController extends Controller
{
    public function list()
    {
        $usaha = Maisah::all();
        return view('warga.pages.usahawarga.list',compact('usaha'));
    }
    public function add()
    {
        return view('warga.pages.profile.maisah');
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => 'required|string|min:5',
            'alamat' => 'required|string',
            'telp' => 'required|string|min:5',
        ]);

        $data = Auth::user()->nik;
        $profile = Warga::where('nik',$data)->first();

        $data = new Maisah();
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->maps = $request->maps;
        $data->category_id = 0;
        $data->telp = $request->telp;
        $data->pendapatan = $request->pendapatan;
        $data->warga_id = $profile->warga_id;
        $data->save();
        // dd($data);
        return redirect()->route('profile.index');
        
    }
}
