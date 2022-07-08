<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KegiatanRequest;
use App\Models\Cabang;
use App\Models\Element;
use App\Models\Kegiatan;
use App\Models\PanitiaKegiatan;
use App\Models\PresensiKegiatan;
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
        $kegiatan = DB::table('d_event')->orderByDesc('event_id')->get();
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
        $data->jenis = $request->jenis;
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
    public function show($event_id)
    {
        // $detail_kegiatan= Kegiatan::findOrFail($event_id);
        $detail_kegiatan= DB::table('d_event')->where('event_id',$event_id)->first();

        // kurban
        
        return view('admin.pages.kegiatan.presensi',compact('detail_kegiatan'));
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

    public function kurban()
    {
        $cabang = Cabang::pluck('nama','id_cabang');
        $element = Element::pluck('nama','id');
        $datakegiatan = Kegiatan::where('jenis','kurban')->get();
        // $panitia = PanitiaKegiatan::with('kegiatan','warga')->get();
        // query panitia
        $panitia = DB::table('panitia_kegiatan')
                    ->join('d_event','d_event.event_id','=','panitia_kegiatan.event_id')
                    ->join('d_warga','panitia_kegiatan.warga_id','=','d_warga.warga_id')
                    ->join('md_cabang','d_warga.id_cabang','=','md_cabang.id_cabang')
                    ->select('panitia_kegiatan.*','d_event.nama as nama_kegiatan','d_warga.nama as nama_warga','md_cabang.nama as nama_cabang')
                    ->get();
        // dd($panitia);
        return view('admin.pages.kurban.data',compact('datakegiatan','cabang','element'));
    }

    public function panitia_kurban_create($event_id)
    {
        $kegiatankurban = Kegiatan::findOrFail($event_id);
        $kegiatan = Kegiatan::select('nama','event_id')->where('jenis','kurban')->get();
        $panitia = DB::table('panitia_kegiatan')
                    ->join('d_event','d_event.event_id','=','panitia_kegiatan.event_id')
                    ->join('d_warga','panitia_kegiatan.warga_id','=','d_warga.warga_id')
                    ->join('md_cabang','d_warga.id_cabang','=','md_cabang.id_cabang')
                    ->where('panitia_kegiatan.type','kurban')
                    ->where('panitia_kegiatan.event_id',$event_id)
                    ->select('panitia_kegiatan.*','d_event.nama as nama_kegiatan','d_warga.nama as nama_warga','md_cabang.nama as nama_cabang','d_warga.warga_id')
                    ->get();
        return view('admin.pages.kurban.panitia-create',compact('kegiatankurban','kegiatan','panitia'));
    }

    public function detail_panitia_kurban(Request $request)
    {
        $eventId = $request->event;
        $kegiatankurban = Kegiatan::where('event_id',$request->event)->first();
        $panitia = DB::table('panitia_kegiatan')
                    ->join('d_event','d_event.event_id','=','panitia_kegiatan.event_id')
                    ->join('d_warga','panitia_kegiatan.warga_id','=','d_warga.warga_id')
                    ->join('md_cabang','d_warga.id_cabang','=','md_cabang.id_cabang')
                    ->where('panitia_kegiatan.type','kurban')
                    ->where('panitia_kegiatan.event_id',$request->event)
                    ->select('panitia_kegiatan.*','d_event.nama as nama_kegiatan','d_warga.nama as nama_warga','md_cabang.nama as nama_cabang','d_warga.warga_id')
                    ->get();
                    // dd($panitia);
        if ($request->key=="presensi_panitia") {
            // dd($panitahadir);
            return view('admin.pages.kurban.presensi-kurban',compact('panitia','kegiatankurban'));
        }elseif ($request->key=="detail_panitia") {
            $panitia_detail = clone $panitia;
            return view('admin.pages.kurban.data-panitia',compact('panitia_detail','kegiatankurban'));
            
        }elseif ($request->key=="statistik_presensi") {
            $totalpanitia = $panitia->count();
            $panitahadir = PresensiKegiatan::where('type','kurban')->where('keterangan','hadir')->where('event_id',$request->event)->count();
            return view('admin.pages.kurban.part.statistik-presensi',compact('totalpanitia','panitahadir'));

        }elseif ($request->key =="cetak_presensi") {
            $cetak = PresensiKegiatan::select('event_registers.*','d_warga.nama as nama_warga','d_event.nama as nama_kegiatan','md_cabang.nama as nama_cabang','panitia_kegiatan.bagian as bagian_panitia')
                                        ->join('d_warga','event_registers.warga_id','=','d_warga.warga_id')
                                        ->join('md_cabang','md_cabang.id_cabang','=','d_warga.id_cabang')
                                        ->join('panitia_kegiatan','panitia_kegiatan.warga_id','=','d_warga.warga_id')
                                        ->join('d_event','event_registers.event_id','=','d_event.event_id')
                                        ->where('event_registers.event_id',$eventId)
                                        ->where('panitia_kegiatan.event_id',$eventId)
                                        ->get();
                                        // dd($cetak);
            return view('admin.pages.kurban.part.cetak-presensi',compact('cetak','request','kegiatankurban'));
        }

        
    }

    public function delete_panitia_kegiatan($id)
    {
        $panitia = PanitiaKegiatan::findOrFail($id);
        $panitia->delete();
        return redirect()->back()->with('success','Data Panitia Kegiatan Berhasil Dihapus');
    }

    public function presensi_panitia_kurban($event_id)
    {
        $presensi_panitia = Kegiatan::findOrFail($event_id);
        $panitia = DB::table('panitia_kegiatan')
                    ->join('d_event','d_event.event_id','=','panitia_kegiatan.event_id')
                    ->join('d_warga','panitia_kegiatan.warga_id','=','d_warga.warga_id')
                    ->join('md_cabang','d_warga.id_cabang','=','md_cabang.id_cabang')
                    ->where('panitia_kegiatan.type','kurban')
                    ->where('panitia_kegiatan.event_id',$event_id)
                    ->select('panitia_kegiatan.*','d_event.nama as nama_kegiatan','d_warga.nama as nama_warga','md_cabang.nama as nama_cabang','d_warga.warga_id')
                    ->get();
        return view('admin.pages.kurban.presensi-kurban',compact('presensi_panitia'));
    }

    public function insertPanitia(Request $request)
    {
        $cek = PanitiaKegiatan::where('warga_id',$request->warga_id)->where('event_id',$request->event_id)->count('warga_id');

        if ($cek < 1) {
            $panitia_insert = new PanitiaKegiatan();
            $panitia_insert->event_id = $request->event_id;
            $panitia_insert->warga_id = $request->warga_id;
            $panitia_insert->id_cabang = $request->id_cabang;
            $panitia_insert->type = 'kurban';
            $panitia_insert->status = 1;
            $panitia_insert->bagian = $request->bagian;
            $panitia_insert->save();
            if ($panitia_insert == true) {
                return response()->json(["status"=>"berhasil ditambahkan"]);
            } else {
                return response()->json(["status"=>"gagal ditambahkan"]);
                # code...
            }
        } else {
            return response()->json(["status"=>"sudah menjadi panitia"]);
            
        }
    }
        
    public function presensi($event_id)
    {
        $kegiatan = Kegiatan::findOrFail($event_id);
        $presensi = DB::table('event_registers')
                        ->join('d_event','event_registers.event_id','=','d_event.event_id')
                        ->join('d_warga','event_registers.warga_id','=','d_warga.warga_id')
                        ->join('md_cabang','d_warga.id_cabang','=','md_cabang.id_cabang')
                        ->select('event_registers.*','d_event.nama as kegiatan','d_warga.nama as warga','md_cabang.nama as cabang')
                        ->where('event_registers.event_id',$event_id)
                        ->orderBy('id','desc')
                        ->get();
        return view('admin.pages.kegiatan.presensi-kegiatan',compact('kegiatan','presensi'));
    }
}
