@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <div class="row">
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
                    <div class="col-6">
                        Data Panitia 
                        <h3 class="dashboard-title">
                            {{$kegiatankurban->nama}}
                        </h3>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('laporan')}}">
                            <button class="btn btn-blue"
                                style="background-color: #0bc8f7;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                <span> <i class="fa fa-file" aria-hidden="true"></i></span> Laporan</button>
                        </a>
                        <button class="btn btn-blue" data-toggle="modal" data-target="#ModalKegiatan"
                        style="background-color: #F73A0B;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                        <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Kegiatan</button>

                        {{-- <a class="btn btn-blue" href="{{route('panitia.kegiatan.create')}}"
                        style="background-color: #F73A0B;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                        <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Kegiatan</a> --}}
                        
                    </div>
                </div>
                <br>
                <div class="container-fluid table">
                    <br>
                    <h6>
                        Data Panitia
                    </h6>
                    <br>
                    <div>
                        <table class="table table-striped" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama </th>
                                    <th>Cabang</th>
                                    <th>Bagian</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($panitia_detail as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_warga ?? ''}}</td>
                                        <td>{{ $item->nama_cabang ?? '' }}</td>
                                        <td>{{ $item->bagian ?? '' }}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection

