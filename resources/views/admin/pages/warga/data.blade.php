@extends('admin.layouts.adminbaru')
@section('content')
<div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up"
data-aos-delay="100">
<div class="container-fluid">
    <br>
    <!-- Box-->
    <div class="dashboard-heading">
        <h5 class="dashboard-title">
            Data Warga
        </h5>
        <br>
        <div class="container-fluid table">
            <br>
            <h6>
                Data Cabang
            </h6>
            <br>
            <div>
                <table class="table table-striped" id="data-cabang">
                    <thead class="head-table">
                        <tr>
                            <th>No</th>
                            <th>Nama Cabang</th>
                            <th>Jumlah Warga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="body-table">
                        @foreach ($cabang as $item)    
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>NULL</td>
                                <td>
                                    <a href="" style="text-decoration: none; color:#3685C8;">
                                        lihat
                                    </a>
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
    <!-- Box-->
    <div class="row">
        <div class="col-md-6">
            <a href="{{route('warga.create')}}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-user-edit"></i> Tambah Warga</a>
        </div>
    </div>
    <div class="dashboard-heading">
        <br>
        <div class="container-fluid table">
            <br>
            <h6>
                Data Warga
            </h6>
            <br>
            <div>
                <table class="table table-striped" id="table-inventaris-book">
                    <thead class="head-table">
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Warga</th>
                            <th>Cabang</th>
                            <th>No Telp/WA</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="body-table">
                        @foreach ($warga as $item)
                                        
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->cabang}}</td>
                                        <td>TELP</td>
                                        <td>{{$item->pekerjaan}}</td>
                                        <td> 
                                            <a href="{{route('warga.edit',$item->warga_id)}}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-user-edit"></i> Edit</a>
                                            <a href="{{route('warga.destroy',$item->warga_id)}}" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i> Hapus</a>
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
