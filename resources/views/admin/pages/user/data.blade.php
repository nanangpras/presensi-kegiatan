@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <br>
            <!-- Box-->
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    My Profile
                </h5>
                <br>
                <div class="container-fluid content" style="background-color: rgba(131, 131, 131, 0.231);padding: 50px;">
                    <br>
                    @foreach ($profile as $item)
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="/presensi/images/png/img-user.png" alt="" style=" height: 100px;">
                                    </div>
                                    <div class="col-6">
                                        <h6 style="font-size: 20px;">{{$item->nama}}</h6>
                                        <p style="color: #6C6866;">
                                            Warga <br>
                                            <span> <i class="fa fa-map-pin" aria-hidden="true"></i></span>
                                            {{$item->alamat}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-12">
                                <a href="" class="align-content-center">
                                    <button class="btn btn-blue"
                                        style="background-color: #F73A0B; color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                        Update Profile</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-blue"
                                        style="background-color: #49494968; color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                        123 Warga</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="container-fluid table">
                                <h6>Tentang Saya</h6>
                                <br>
                                <p style="color: #6C6866; font-weight: 300;">
                                    {{$saya->nik}}
                                    <br>
                                    {{$saya->nama}}
                                    golongan darah :    {{$saya->gol_darah}}
                                    <br>
                                    {{$saya->email}}
                                    <br>
                                    {{$saya->cabang}}
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="container-fluid table">
                                <h6>Activity</h6>
                                <br>
                                <a href="#" style="text-decoration: none; color: rgb(95, 95, 95);">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="/presensi/images/png/img-user.png" alt=""
                                                style="height: 75px; width: 75px; object-fit: fill;">
                                        </div>
                                        <div class="col-8">
                                            <p>
                                                <b> Assalamualaikum</b>
                                                <br>
                                                Ini adalah Postingan Pertama
                                            </p>
                                            <hr>
                                        </div>


                                    </div>
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
