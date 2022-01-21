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
                            Kegiatan
                        </h5>
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
                        
                    </div>
                </div>
                <br>
                <div class="container-fluid table">
                    <br>
                    <h6>
                        Data Cabang
                    </h6>
                    <br>
                    <div>
                        <table class="table table-striped" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Akhir</th>
                                    <th>Cabang/Elemen</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($kegiatan as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->tgl_event_mulai }}</td>
                                        <td>{{ $item->tgl_event_akhir }}</td>
                                        <td>element</td>
                                        <td>lokasi</td>
                                        <td>status</td>
                                        <td>
                                            <a href="{{ route('warga.edit', $item->event_id) }}"
                                                class="btn btn-sm btn-warning"><i class="nav-icon fas fa-user-edit"></i>
                                                Edit</a>
                                            <a href="{{ route('warga.destroy', $item->event_id) }}"
                                                class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i>
                                                Edit</a>
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
                            placeholder="Masukkan Nama Element" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Tanggal Mulai Pelaksanaan</label>
                        <input type="date" class="form-control @error('tgl_event_mulai') is invalid @enderror" name="tgl_event_mulai"
                            placeholder="Masukkan Nama Element" value="{{ old('tgl_event_mulai') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Tanggal Berakhir Pelaksanaan</label>
                        <input type="date" class="form-control @error('tgl_event_akhir') is invalid @enderror" name="tgl_event_akhir"
                            placeholder="Masukkan Nama Element" value="{{ old('tgl_event_akhir') }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Peserta Cabang</label>
                       <select name="id_cabang" id="id_cabang" class="form-control">
                           <option value="">-</option>
                           @foreach ($cabang as $id => $nama)
                               <option value="{{$id}}">{{$nama}}</option>
                           @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Peserta Element</label>
                        <select name="element_id" id="element_id" class="form-control">
                            <option value="">-</option>
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
                        style="background-color: #F73A0B;color: white; border-radius: 30px; padding: 10px; font-weight: 500;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</div>

@push('after-scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $('#id_cabang').select2({
                placeholder: 'Pilih Cabang',
                ajax:{
                    url:'/admin/list/cabang',
                    type: 'post',
                    dataType:'json',
                    delay:250,
                    data: function(params){
                        return{
                            _token: CSRF_TOKEN,
                            search: params.term
                        };
                    },
                    processResults:function(response){
                        return{
                            results: response
                        };
                    },
                    cache:true
                }
            });
    </script>
@endpush