@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <div class="col-12">
                <div class="dashboard-heading">
                    <h5 class="dashboard-title">
                        Presensi
                    </h5>
                    <br>
                    <div class="dashboard-content">
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{$errors->first()}}
                          </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @foreach ($presensi as $item)
                        <form action="{{route('presensi.insert')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-12">
                                    <div class="mb-5"
                                        style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <h4 style="font-weight: 700; font-size: 30px; "> {{$item->nama}}</h4>
                                        <input type="hidden" name="event_id" value="{{$item->event_id}}">
                                        <p style="font-size: 14px;">
                                            {{$item->nama}}
                                            <br>
                                            <b style="color:#f93a0b ;">{{$item->id_cabang}}</b> <br>
                                            Waktu mulai: {{$item->tgl_event_mulai}} <br>
                                            Waktu akhir: {{$item->tgl_event_akhir}} <br>
                                            dimulai: <b id="time"></b>
                                        </p>
                                        <div class="row">
                                            <div class="col-6">
    
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-dager" data-toggle="modal" data-target="#hadir"
                                                    style="background-color: #1E87E8; color: white;">
                                                    Hadir
                                                </button>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        @endforeach
                        
                        {{-- @foreach ($donor as $item) --}}
                        <form action="{{route('presensi.insert.donor')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-3 col-12">
                                    <div class="mb-5"
                                        style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <h4 style="font-weight: 700; font-size: 30px; "> {{$donor->nama}}</h4>
                                        <input type="hidden" name="event_id" value="{{$donor->event_id}}">
                                        <p style="font-size: 14px;">
                                            {{$donor->nama}}
                                            <br>
                                            Waktu mulai: {{$donor->tgl_donor_mulai}} <br>
                                            dimulai: <b id="time"></b>
                                        </p>
                                        <div class="row">
                                            <div class="col-6">
    
                                            </div>
                                            <div class="col-6 text-right">
                                                <button type="submit" class="btn btn-dager" data-toggle="modal" data-target="#hadir"
                                                    style="background-color: #1E87E8; color: white;">
                                                    Hadir
                                                </button>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        {{-- @endforeach --}}
                    </div>
                </div>
                <br>
                <!-- Box-->

                <div class="dashboard-heading">
                    <h5 class="dashboard-title">
                        Kegitan Terbaru
                    </h5>
                    <br>
                    <div class="container-fluid table">
                        <div>
                            <table class="table table-striped" id="table-inventaris-book">
                                <thead class="head-table">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Jumlah Peserta</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="body-table">
                                    <tr>
                                        <td>1</td>
                                        <td>Jalan Sehar Se-DIY</td>
                                        <td>300</td>
                                        <td>2 Februari 2022</td>
                                        <td>
                                            <a href="" style="text-decoration: none; color:#3685C8;">
                                                lihat
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <a href="">
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
