@extends('admin.layouts.admin')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title">Tambah Kegiatan MTA DIY</h3>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form class="form-horizontal" method="POST" action="{{ route('kegiatan.store') }}" novalidate>
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10 has-validation">
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is invalid @enderror"
                                            value="{{ old('nama') }}" id="inputEmail3" placeholder="Nama Kegiatan">
                                        @error('nama')
                                            <span class="help-block" style="color: red;"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                                    <div class="col-sm-10 has-validation">
                                        <input type="datetime-local" name="tgl_event_mulai" class="form-control @error('tgl_event_mulai') is invalid @enderror"
                                        value="{{ old('tgl_event_mulai') }}" id="inputEmail3"
                                            placeholder="Email">
                                        @error('tgl_event_mulai')
                                            <span class="help-block" style="color: red;"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                    <div class="col-sm-10 has-validation">
                                        <input type="datetime-local" name="tgl_event_akhir" class="form-control @error('tgl_event_akhir') is invalid @enderror"
                                        value="{{ old('tgl_event_akhir') }}" id="tgl_event_akhir"
                                            placeholder="Kode Presensi">
                                        @error('tgl_event_akhir')
                                            <span class="help-block" style="color: red;"> {{$message}} </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-default float-right">Batal</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
