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
                    <h5 class="dashboard-title">
                        Kegiatan Kurban
                    </h5>
                </div>
                <div class="col-6 text-right">
                    <a href="{{route('laporan')}}">
                        <button class="btn btn-blue"
                            style="background-color: #057CE4;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                            <span> <i class="fa fa-file" aria-hidden="true"></i></span> Laporan</button>
                    </a>
                    <button class="btn btn-blue" data-toggle="modal" data-target="#ModalKegiatan"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                        <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Kegiatan</button>

                    {{-- <a class="btn btn-blue" href="{{route('panitia.kegiatan.create')}}"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                        <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Kegiatan</a> --}}

                </div>
            </div>
            <br>
            <div class="container-fluid table">
                <br>
                <h6>
                    Data Kegiatan Kurban
                </h6>
                <br>
                <div>
                    <table class="table table-striped" id="table-inventaris-book">
                        <thead class="head-table">
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Lokasi</th>
                                <th>Waktu</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                            @foreach ($datakegiatan as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama ?? ''}}</td>
                                <td>{{ $item->lokasi ?? '' }}</td>
                                <td>{{ $item->tgl_event_mulai ?? '' }}</td>
                                <td>{{ $item->jenis}}</td>
                                <td>
                                    {{-- <a href="{{route('panitia-kurban.presensi',$item->event_id)}}"
                                        class="btn btn-sm btn-danger" role="button"><i
                                            class="nav-icon fa fa-trash-alt"></i>
                                        Presensi
                                    </a>
                                    <a href="{{route('panitia-kurban.detail',$item->event_id)}}"
                                        style="background-color: #F4E06D; color:white" class="btn btn-sm btn-danger"
                                        role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                        Data Panitia
                                    </a> --}}
                                    <a href="{{route('panitia-kurban.detail',['key'=>'presensi_panitia'])}}&event={{$item->event_id}}"
                                        class="btn btn-sm btn-danger" role="button"><i
                                            class="nav-icon fa fa-trash-alt"></i>
                                        Presensi
                                    </a>
                                    <a href="{{route('panitia-kurban.detail',['key'=>'detail_panitia'])}}&event={{$item->event_id}}"
                                        style="background-color: #F4E06D; color:white" class="btn btn-sm btn-danger"
                                        role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                        Data Panitia
                                    </a>
                                    <a href="{{route('panitia-kurban.create',$item->event_id)}}"
                                        style="background-color: #057CE4; color:white" class="btn btn-sm btn-danger"
                                        role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                        Tambah Panitia
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
            {{-- <div class="container-fluid table">
                <br>
                <h6>
                    Data Kegiatan Kurban
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
                                    <a href="{{ route('donor.edit', $item->id) }}" class="btn btn-sm btn-warning"><i
                                            class="nav-icon fa fa-user-edit"></i>
                                        Edit</a>
                                    <a href="{{ route('donor.destroy', $item->id) }}" class="btn btn-sm btn-danger"
                                        role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                        Hapus</a>
                                    <a href="{{ route('donor.show', $item->id) }}" class="btn btn-sm btn-danger"
                                        role="button"><i class="nav-icon fa fa-trash-alt"></i>
                                        Presensi</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="">
                </a>

            </div> --}}
        </div>
    </div>
</div>

@endsection
<div class="modal fade" id="ModalKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('kegiatan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama Kegiatan</label>
                        <input type="text" class="form-control @error('nama') is invalid @enderror" name="nama"
                            placeholder="Masukkan Nama Kegiatan" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Tanggal Mulai Pelaksanaan</label>
                        <input type="date" class="form-control @error('tgl_event_mulai') is invalid @enderror"
                            name="tgl_event_mulai" placeholder="Masukkan Nama Element"
                            value="{{ old('tgl_event_mulai') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Tanggal Berakhir Pelaksanaan</label>
                        <input type="date" class="form-control @error('tgl_event_akhir') is invalid @enderror"
                            name="tgl_event_akhir" placeholder="Masukkan Nama Element"
                            value="{{ old('tgl_event_akhir') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Jenis Kegiatan</label>
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="kurban">Kurban</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Peserta Cabang</label>
                        <select name="id_cabang" id="id_cabang" class="form-control">
                            <option value="">Pilih</option>
                            <option value="0">Semua</option>
                            @foreach ($cabang as $id => $nama)
                            <option value="{{$id}}">{{$nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Peserta Element</label>
                        <select name="element_id" id="element_id" class="form-control">
                            <option value="">Pilih</option>
                            <option value="0">Semua</option>
                            @foreach ($element as $id => $nama)
                            <option value="{{$id}}">{{$nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Nama Lokasi</label>
                        <input type="text" class="form-control @error('lokasi') is invalid @enderror" name="lokasi"
                            placeholder="Masukkan Nama Lokasi" value="{{ old('lokasi') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Maps Lokasi</label>
                        <input type="text" class="form-control @error('maps') is invalid @enderror" name="maps"
                            placeholder="Masukkan link dari nama lokasi" value="{{ old('maps') }}">
                    </div>
                    <button type="submit" class="btn btn-block"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</div>