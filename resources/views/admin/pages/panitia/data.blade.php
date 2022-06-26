@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        
        <div class="container-fluid">
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="mb-5"
                            style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                            <div class="row">
                                <div class="col-4">
                                    <img src="presensi/images/assets/chart1.png" alt="">
                                </div>
                                <div class="col-8">
                                    <h4 style="font-weight: 700; font-size: 30px; "> 2000</h4>
                                    <p style="font-size: 14px;"> Total Warga</p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="mb-5"
                            style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                            <div class="row">
                                <div class="col-4">
                                    <img src="presensi/images/assets/chart2.png" alt="">
                                </div>
                                <div class="col-8">
                                    <h4 style="font-weight: 700; font-size: 30px; "> 5</h4>
                                    <p style="font-size: 14px;"> Total Kegiatan</p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="mb-5"
                            style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                            <div class="row">
                                <div class="col-4">
                                    <img src="presensi/images/assets/chart3.png" alt="">
                                </div>
                                <div class="col-8">
                                    <h4 style="font-weight: 700; font-size: 30px; "> 400</h4>
                                    <p style="font-size: 14px;">Warga Baru</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
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
                        <h5 class="dashboard-title">
                            Panitia Kegiatan
                        </h5>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{route('laporan')}}">
                            <button class="btn btn-blue"
                                style="background-color: #0bc8f7;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                <span> <i class="fa fa-file" aria-hidden="true"></i></span> Laporan</button>
                        </a>
                        <a class="btn btn-blue" href="{{route('panitia.kegiatan.create')}}"
                        style="background-color: #F73A0B;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                        <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Kegiatan</a>
                        
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
                                    <th>Nama Kegiatan</th>
                                    <th>Nama Warga</th>
                                    <th>Cabang/Elemen</th>
                                    <th>Type</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($panitia as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kegiatan ?? ''}}</td>
                                        <td>{{ $item->nama_warga ?? '' }}</td>
                                        <td>{{ $item->nama_cabang ?? '' }}</td>
                                        <td>{{ $item->type}}</td>
                                        <td>
                                            <a href="{{ route('donor.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"><i class="nav-icon fa fa-user-edit"></i>
                                                Edit</a>
                                            <a href="{{ route('donor.destroy', $item->id) }}"
                                                class="btn btn-sm btn-danger" role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                                Hapus</a>
                                            <a href="{{ route('donor.show', $item->id) }}"
                                                class="btn btn-sm btn-danger" role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                                Presensi</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <a href="">
                    </a>

                </div>
            </div>
        </div>
    </div>
    
@endsection


