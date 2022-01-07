@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <div class="row">
                    <div class="col-6">
                        <h5 class="dashboard-title">
                            Laporan Kegiatan
                        </h5>
                    </div>
                </div>
                <br>
                <div class="container-fluid table">
                    <br>
                    <h6>
                        Data Laporan
                    </h6>
                    <br>
                    <div>
                        <table class="table table-striped" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>Cabang</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($laporanpresensi as $item)
                                        
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td> {{ isset($item->nama_cabang) ? $item->nama_cabang : 'tidak ada' }}</td>
                                        <td> {{ isset($item->nik) ? $item->nik : 'tidak ada' }}</td>
                                        <td> {{ isset($item->nama) ? $item->nama : 'tidak ada' }}</td>
                                        <td> {{ isset($item->kegiatan) ? $item->kegiatan : 'tidak ada' }}</td>
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
