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
                                
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example12" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Cabang</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Kegiatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laporanpresensi as $item)
                                        
                                    <tr>
                                        <td> {{ isset($item->nama_cabang) ? $item->nama_cabang : 'tidak ada' }}</td>
                                        <td> {{ isset($item->nik) ? $item->nik : 'tidak ada' }}</td>
                                        <td> {{ isset($item->nama) ? $item->nama : 'tidak ada' }}</td>
                                        <td> {{ isset($item->kegiatan) ? $item->kegiatan : 'tidak ada' }}</td>
                                        
                                        <td> 
                                            <a href="{{route('warga.edit',$item->warga_id)}}" class="btn btn-sm btn-warning"><i class="nav-icon fas fa-user-edit"></i> Edit</a>
                                            <a href="{{route('warga.destroy',$item->warga_id)}}" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash-alt"></i> Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>Cabang</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Kegiatan</th>
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
            $("#example12").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endpush
