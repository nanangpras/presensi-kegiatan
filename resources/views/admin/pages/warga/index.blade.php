@extends('admin.layouts.admin')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">

                                    <h3 class="card-title">Daftar Warga MTA</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="{{route('warga.create')}}" class="btn btn-primary"><i class="nav-icon fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Cabang</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warga as $item)
                                        
                                    <tr>
                                        <td>{{$item->cabang}}</td>
                                        <td>{{$item->nik}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td> 
                                            <a href="{{route('warga.edit',$item->warga_id)}}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-user-edit"></i> Edit</a>
                                            <a href="{{route('warga.destroy',$item->warga_id)}}" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i> Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>Nama</th>
                                    <th>Kode Presensi</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@push('after-scripts')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
