@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <div class="container-fluid">
            <br>
            <!-- Box-->
            @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first() }}
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
            <div class="dashboard-heading">
                <div class="row">
                    
                    <div class="col-6">
                        Data Panitia
                        <h3 class="dashboard-title">
                            {{ $kegiatankurban->nama }}
                        </h3>
                    </div>
                    <div class="col-6 text-right">


                        {{-- <a class="btn btn-blue" href="{{route('panitia.kegiatan.create')}}"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
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
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($panitia_detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_warga ?? '' }}</td>
                                        <td>{{ $item->nama_cabang ?? '' }}</td>
                                        <td>{{ $item->bagian ?? '' }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                            {{-- <a href="#" class="btn btn-primary btn-sm" style="background: #F73A0B;"><i style="color: azure" class="fa fa-trash"></i></a> --}}
                                            <form action="{{ route('panitia.kegiatan.delete', $item->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" style="background: #F73A0B;"
                                                    value="Delete"
                                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data {{ $item->nama_warga }} ?')">
                                                    <i style="color: azure" class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
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
