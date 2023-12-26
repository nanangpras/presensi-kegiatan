@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
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
                <div class="col-lg-12 col-12">
                    <div class="dashboard-heading">
                        <h4> Kegiatan : {{$kegiatan->nama}}</h4>
                        <input type="hidden" name="event_id" id="event_id" value="{{$kegiatan->event_id}}">
                        <br>
                        <h5 class="dashboard-title">
                            Cari Warga
                        </h5>
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-lg-7 col-6">
                                    <div class="mb-5" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <input type="text" placeholder="cari warga dengan NIK" class="form-control" id="nik">
                                        <br>
                                        <input type="text" placeholder="cari warga dengan nama" class="form-control" id="nama">
                                    </div>

                                    <div class="mb-5" id="result" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <h5>Hasil pencarian</h5>
                                        <br>
                                        <p>..</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-6">
                                    <div class="mb-5" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <button class="btn btn-lg btn-primary" id="cari">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                <div class="container-fluid table">
                    <div class="card">
                        <div class="card-header">
                            <h6>
                                Data Peserta
                            </h6>
                            <button type="button" class="btn btn-danger" disabled id="bulk-presensi" onclick="presensikurban()" style="float: left;">presensikan</button>
                            <br>
                        </div>
                        <div class="card-body">

                    <div>
                        <table class="table table-striped tablePanitia" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th><input id="check-all" type="checkbox" class="select-all checkbox" value="select-all" /></th>
                                    <th>No</th>
                                    <th>Nama Warga</th>
                                    <th>Cabang</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($peserta as $item)

                                    <tr>
                                        <td>
                                            <input type="checkbox" name="select_process[{{$item->id}}]" class="select_single" value="{{$item->id}}">
                                            <input type="hidden" name="warga_id" id="wargaId" class="select_single" value="{{$item->warga_id}}">
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->warga }}</td>
                                        <td>{{ $item->cabang }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>
                    <br>


                    <a href="">
                    </a>

                </div>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var idpresensi = $("#idpres").val();
        $(document).ready(function(){
            $('#cari').on('click',function(){
                // alert('ok');
                $.ajax({
                    type: "get",
                    url: "{{ route('search-nik') }}",
                    dataType: "json",
                    data: {
                        'nik' : $('#nik').val(),
                        'nama' : $('#nama').val(),
                    },
                    success: function (response) {
                        // console.log(response);
                        var result = '';
                        $.each(response, function (key, value) {
                            // var result = response[key];
                             result +=
                                '<div class="row" id="hasil-cari" data-id='+ value.warga_id +'>' +
                                    '<div class="col-2"> foto </div>' +
                                    '<div class="col-6">' +
                                        '<input type="hidden" id="warga_id" value='+value.warga_id+'>'+
                                        '<input type="hidden" id="id_cabang" value='+value.id_cabang+'>'+
                                        '<input type="hidden" id="user_id" value='+value.user_id+'>'+
                                        '<p class="m-0 sub-text" id="warga_id">'+ value.warga_id +'</p>' +
                                        '<p class="m-0 sub-text" id="warga_id">'+ value.nama_cabang +'</p>' +
                                        '<a href=""><h6 class="m-0">'+ value.nama +'</h6></a>' +
                                        '<p class="m-0 sub-text">'+ value.alamat +'</p>' +
                                        '<p class="m-0 sub-text">'+ value.telp +'</p>' +
                                    '</div>' +
                                    '<div class="col-4 d-flex justify-content-end align-items-center">' +
                                        '<input class="form-control" type="hidden" value='+value.warga_id+' id="idwarga">'+
                                        // '<a href="" class="badge badge-pill badge-light" style="font-size: 14px;">$'+ el.price +'</a>' +
                                        '<a type="button" id="tambah-peserta" class="badge badge-pill badge-light" style="font-size: 14px;">Tambah Peserta</a>' +
                                        '<input class="form-check-input" type="checkbox" value='+value.warga_id+' id="pilihPanitia">'+
                                    '</div>' +
                                '</div>';
                        });
                        $('#result').html(result);
                    }
                });
            });

            $('.bagian').select2();


        });

        $(document).on("click", "#tambah-peserta", function() {
            // alert('ok');

            var event = $('#event_id').val();
            var warga = $('#warga_id').val();
            var cabang = $('#id_cabang').val();
            var user = $('#user_id').val();
            var pilihPanitia = $('#pilihPanitia').val();
            var idWarga = [];
            $('.form-check-input').each(function(){
                if ($(this).is(":checked")) {
                    idWarga.push($(this).val());
                }
            });
            idWarga = idWarga.toString();
            // console.log(idWarga);
            // console.log(event);
            // console.log(pilihpanitia);
            if (idWarga) {

                $.ajax({
                    type: "post",
                    url: "{{ route('presensi.kegiatan.admin') }}",
                    data: {
                        _token:CSRF_TOKEN,
                        warga_id:idWarga,
                        event_id:event,
                        user_id:user,
                        keterangan:"belum hadir",
                        type:"umum",
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        alert(response.status);
                        location.reload(true);
                    }
                });
            }
        });

    </script>
@endpush
