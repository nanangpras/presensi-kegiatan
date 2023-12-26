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
                        <h5 class="dashboard-title">
                            Presensi Kegiatan {{ $kegiatan->nama }}
                        </h5>
                        {{-- <input type="text" value="{{$kegiatan->event_id}}" id="event_id"> --}}
                        <br>
                        <div class="dashboard-content">
                            <div id="stat-presensi">
                                @include('admin.pages.kegiatan.part.statistik-presensi')
                            </div>
                        </div>
                        @if (!$check_admin_cabang == 'cabang' || !$kegiatan->jenis == "umum")
                            <div class="dashboard-content">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <div class="mb-5"
                                            style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                            <img src="{{asset('presensi/images/png/kegiatan.png')}}"
                                                alt="" style="border-radius: 5px;">
                                            <br> <br>
                                            <input type="hidden" id="event_id" value="{{$kegiatan->event_id}}">
                                            <p style="font-size: 14px;"> <b>{{$kegiatan->nama}} </b> </p>
                                            <p style="font-size: 10px;"><span><i class="fa fa-map-pin" aria-hidden="true"></i></span> {{$kegiatan->lokasi}}</p>

                                        </div>
                                    </div>
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
                        @endif

                    </div>
                </div>
                <br>
                <div class="container-fluid table">
                    <br>
                    <h6>
                        Data Presensi
                    </h6>
                    <br>
                    <div>
                        <table class="table table-striped" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Nama Warga</th>
                                    <th>Cabang</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @if ($check_admin_cabang == 'cabang')
                                    @foreach ($presensi as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kegiatan}}</td>
                                            <td>{{$item->warga}}</td>
                                            <td>{{$item->cabang}}</td>
                                            <td>{{$item->keterangan}}</td>
                                            <td>
                                                @if ($item->keterangan == "belum hadir")
                                                    <button class="btn btn-primary" id="btn_status" data-keterangan="hadir" data-id="{{$item->id}}">Hadir</button>
                                                    <button class="btn btn-primary" id="btn_status" data-keterangan="sakit" data-id="{{$item->id}}">Sakit</button>
                                                    <button class="btn btn-primary" id="btn_status" data-keterangan="izin" data-id="{{$item->id}}">Izin</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($presensi as $item)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kegiatan }}</td>
                                            <td>{{ $item->warga }}</td>
                                            <td>{{ $item->cabang }}</td>
                                            <td><span class="badge badge-success">{{ $item->keterangan}}</span></td>
                                            @if ($kegiatan->jenis == "umum")
                                                @if ($item->keterangan == "belum hadir")
                                                    <td>
                                                        <button class="btn btn-primary" id="btn_status" data-keterangan="hadir" data-id="{{$item->id}}">Hadir</button>
                                                        <button class="btn btn-primary" id="btn_status" data-keterangan="sakit" data-id="{{$item->id}}">Sakit</button>
                                                        <button class="btn btn-primary" id="btn_status" data-keterangan="izin" data-id="{{$item->id}}">Izin</button>
                                                    </td>
                                                @endif
                                            @endif
                                            <td></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <a href="">
                    </a>

                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@push('after-scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var idpresensi = $("#idpres").val();
        var event_id = $("#event_id").val();
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
                        console.log(response);
                        var result = '';
                        $.each(response, function (key, value) {
                            // var result = response[key];
                             result +=
                                '<div class="row" data-id='+ value.warga_id +'>' +
                                    '<div class="col-2"> foto </div>' +
                                    '<div class="col-6">' +
                                        '<input type="hidden" id="warga_id" value='+value.warga_id+'>'+
                                        '<input type="hidden" id="user_id" value='+value.user_id+'>'+
                                        '<p class="m-0 sub-text" id="warga_id">'+ value.warga_id +'</p>' +
                                        '<p class="m-0 sub-text" id="warga_id">'+ value.nama_cabang +'</p>' +
                                        '<p class="m-0 sub-text" id="user_id">'+ value.user_id +'</p>' +
                                        '<a href=""><h6 class="m-0">'+ value.nama +'</h6></a>' +
                                        '<p class="m-0 sub-text">'+ value.alamat +'</p>' +
                                    '</div>' +
                                    '<div class="col-2">' +
                                        '<input class="form-control" type="hidden" value='+value.warga_id+' id="idwarga">'+
                                        // '<a href="" class="badge badge-pill badge-light" style="font-size: 14px;">$'+ el.price +'</a>' +
                                        '<input class="form-check-input" type="checkbox" value='+value.warga_id+' id="pilihPeserta">'+
                                        '<a type="button" id="klik-hadir" class="badge badge-pill badge-light" style="font-size: 14px; pedding:10px;">hadir</a>' +
                                    '</div>' +
                                '</div>';
                        });
                        $('#result').html(result);
                    }
                });
            });

            // $("#stat-presensi").load(
            //     "{{ route('kegiatan.presensi', ['key' => 'statistik','event_id' => "event_id"]) }}"
            // );

        });

        $(document).on("click", "#klik-hadir", function() {
            var event = $('#event_id').val();
            var warga = $('#warga_id').val();
            var user = $('#user_id').val();
            var pilihPeserta = $('#pilihPeserta').val();
            var idWarga = [];
            $('.form-check-input').each(function(){
                if ($(this).is(":checked")) {
                    idWarga.push($(this).val());
                }
            });
            idWarga = idWarga.toString();
            console.log(idWarga);
            // alert(idWarga);
            // console.log(event);
            // console.log(warga);
            $.ajax({
                type: "post",
                url: "{{ route('presensi.kegiatan.admin') }}",
                data: {_token:CSRF_TOKEN, event_id:event, warga_id:idWarga, user_id:user,keterangan:'hadir' },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    alert(response.status);
                    location.reload(true);
                }
            });
        });

        $(document).on("change", "#status", function() {
            // alert('ok');

            var status = $("#status").val();
            // console.log(idpresensi);
            // console.log(status);

        });

        $(document).on("click", "#btn_status", function(){
            let id = $(this).attr("data-id");
            let keterangan = $(this).attr("data-keterangan");
            // alert(id);
            // alert(keterangan);
            $.ajax({
                type: "PATCH",
                url: "/admin/update/presensi/"+id,
                data: {
                    _token:CSRF_TOKEN,
                    keterangan:keterangan
                },
                success: function (response) {
                    alert(response.status);
                    location.reload(true);
                }
            });
        });

    </script>
@endpush
