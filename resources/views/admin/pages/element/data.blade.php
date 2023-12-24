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
                        Data Element
                    </h5>
                </div>
                <div class="col-6 text-right">
                    <button class="btn btn-blue" data-toggle="modal" data-target="#ModalCreate"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">
                        <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span> Element</button>
                </div>
            </div>
            <br>
            <div class="container-fluid table">
                <h6>
                    Data Element
                </h6>
                <br>
                {{-- Error --}}
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{-- Success --}}
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div>{{ $message }}</div>
                </div>
                @endif

                <div>
                    <table class="table table-striped" id="table-inventaris-book">
                        <thead class="head-table">
                            <tr>
                                <th>No</th>
                                <th>Nama Element</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                            @foreach ($element as $item)

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <a href="{{ route('element.edit', $item->id) }}" class="btn btn-warning"><i
                                            class="fa fa-pencil"></i>
                                        Edit</a>
                                    {{-- <a href="#" class="btn btn-warning" data-nama="{{ $item->nama }}"
                                    data-toggle="modal" data-target="#ModalEdit"><i class="fa fa-pencil"></i>
                                    Edit</a> --}}
                                    {{-- <button class="btn btn-warning" data-nama="{{ $item->nama }}"
                                    data-toggle="modal" data-target="#ModalEdit"><i class="fa fa-pencil"></i>
                                    Edit</button> --}}
                                    <form action="{{ route('element.destroy', $item->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
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

{{-- Create --}}
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Element</h5>
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
                <form action="{{ route('element.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Nama Element</label>
                        <input type="text" class="form-control @error('nama') is invalid @enderror" name="nama"
                            placeholder="Masukkan Nama Element" value="{{ old('nama') }}">
                    </div>
                    <button type="submit" class="btn btn-block"
                        style="background-color: #F73A0B;color: white; border-radius: 8px; padding: 10px; font-weight: 500;">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
