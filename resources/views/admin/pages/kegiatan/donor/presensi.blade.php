@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="dashboard-heading">
                        <h5 class="dashboard-title">
                            Presensi Donor Darah 
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
                                        <p style="font-size: 14px;"> <b>{{$donorpresensi->nama}} </b> </p>
                                        <p style="font-size: 10px;"><span><i class="fa fa-map-pin"
                                                    aria-hidden="true"></i></span> {{$donorpresensi->lokasi}}</p>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-7 col-6">
                                    <div class="mb-5" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <input type="text" placeholder="cari warga dengan NIK" class="form-control" id="nik">
                                    </div>
                                    <div class="mb-5" style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
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
                </div>
                <br>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@push('after-scripts')
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let keyword = $('#nik').val();
        $(document).ready(function(){
            $('#cari').on('click',function(){
                alert('ok');
                // search();
            });
        
        function seacrh(){
            $.ajax({
                type:'get',
                url:"{{ route('search-nik') }}",
                data: {
                    'warga':$keyword
                },
                success::function(data){
                    console.log(warga);
                }
            });
        }

        });
    </script>
@endpush
