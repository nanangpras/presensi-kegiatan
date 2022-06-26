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
                            Cari Warga 
                        </h5>
                        <br>
                        <div class="dashboard-content">
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <div class="mb-5"
                                        style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <img src="{{asset('presensi/images/png/donordarahya.png')}}"
                                            alt="" style="border-radius: 5px;">
                                        <br> <br>
                                        <p style="font-size: 14px;"> <b> </b> </p>
                                        <p style="font-size: 10px;"><span><i class="fa fa-map-pin" aria-hidden="true"></i></span></p>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-7 col-6">
                                    <div class="mb-5" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <input type="text" placeholder="cari warga dengan NIK" class="form-control" id="nik">
                                    </div>
                                    
                                    <div class="mb-5" id="result" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <h5>Hasil pencarian</h5>
                                        <br>
                                        <p>..</p>
                                    </div>

                                    <div class="mb-5" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <select name="event_id" id="event_id" class="form-control">
                                                    <option value="">--pilih kegiatan--</option>
                                                    @foreach ($kegiatan as $item)
                                                        <option name="event_id" value="{{$item->event_id}}">{{$item->nama}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-lg btn-warning" id="tambah-panitia">Tambah Panitia</button>
                                            </div>
                                        </div>
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
                </div>
                {{-- <br>
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
                                    <th>Nama Warga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                @foreach ($presensi as $item)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kegiatan }}</td>
                                        <td>{{ $item->warga }}</td>
                                        <td>
                                            <input type="hidden" id="idpres" value="{{$item->id}}">
                                            <select id="status" name="status" class="form-control"
                                            style="border-radius: 30px; padding-right: 10px;">
                                            <option id="klik-belum" value="belum donor" {{ $item->status == 'belum donor' ? 'selected' : '' }}>Belum Donor</option>
                                            <option id="klik-sudah" value="sudah donor" {{ $item->status == 'sudah donor' ? 'selected' : '' }}>Sudah Donor</option>
                                            
                                        </select>
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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@push('after-scripts')
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
                                        '<input type="hidden" id="id_cabang" value='+value.id_cabang+'>'+
                                        '<p class="m-0 sub-text" id="warga_id">'+ value.warga_id +'</p>' +
                                        '<a href=""><h6 class="m-0">'+ value.nama +'</h6></a>' +
                                        '<p class="m-0 sub-text">'+ value.alamat +'</p>' +
                                    '</div>' +
                                    // '<div class="col-4 d-flex justify-content-end align-items-center">' +
                                    //     // '<a href="" class="badge badge-pill badge-light" style="font-size: 14px;">$'+ el.price +'</a>' +
                                    //     '<a type="button" id="tambah-panitia" class="badge badge-pill badge-light" style="font-size: 14px;">Tambah Panitia</a>' +
                                    // '</div>' +
                                '</div>';
                        });
                        $('#result').html(result);
                    }
                });
            });

        
        });

        $(document).on("click", "#tambah-panitia", function() {
            // alert('ok');

            var event = $('#event_id').val();
            var warga = $('#warga_id').val();
            var cabang = $('#id_cabang').val();

            // alert(cabang);
            // console.log(event);
            // console.log(warga);
            $.ajax({
                type: "post",
                url: "{{ route('panitia.kegiatan.insert') }}",
                data: {
                    _token:CSRF_TOKEN, 
                    event_id:event, 
                    warga_id:warga,
                    id_cabang:cabang,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    alert(response.status);
                    location.reload(true);
                }
            });
        });

    </script>
@endpush
