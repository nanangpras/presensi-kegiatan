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
                                <a href="{{route('profile.edit',$item->nik)}}" class="align-content-center">
                                    <button class="btn btn-blue"
                                        style="background-color: #F73A0B; color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                        Update Profile</button>
                                </a>
                                <a href="">
                                    <button class="btn btn-blue"
                                        style="background-color: #49494968; color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                        4 Usaha</button>
                                </a>
                                <a href="{{route('maisah.add')}}">
                                    <button class="btn btn-blue"
                                        style="background-color: #FF2A1D; color: white; border-radius: 30px; padding: 10px; font-weight: 500;">
                                        <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span> Tambah
                                        Usaha</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="container-fluid table">
                                <h6>Abaut Me</h6>
                                <br>
                                <p style="color: #6C6866; font-weight: 300;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                    occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="dashboard-heading">
                                        <h5 class="dashboard-title">
                                            Usaha Saya
                                        </h5>
                                        <br>
                                        <div class="dashboard-content">
                                            <div class="row">
                                                @foreach ($usaha as $item)
                                                <div class="col-lg-3 col-6">
                                                    <div class="mb-5"
                                                        style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                                        <img src="https://asset.kompas.com/crops/BVjJMq0S-09k36xhJjqDexjJBQ8=/116x0:961x563/750x500/data/photo/2021/02/23/6034de156196c.jpg" alt="" style="border-radius: 5px;">
                                                        <br> <br><p style="font-size: 14px;"> <b>{{$item->nama}} </b> </p>
                                                        <p style="font-size: 10px;"><span><i class="fa fa-map-pin"
                                                                    aria-hidden="true"></i></span> Sleman</p>
                                                        <a href="{{$item->maps}}" target="_blank">
                                                            <div type="button" class="btn btn-blue"
                                                                style="background-color: #F73A0B;color: white; border-radius: 15px; font-weight: 400;padding: 6px; font-size: 12px;">
                                                                <span> <i class="fa fa-map-signs"
                                                                        aria-hidden="true"></i></span> Lokasi
                                                            </div>
                                                        </a>
                                                        <a href="https://api.whatsapp.com/send/?phone={{$item->telp}}&text=Asslamaulaikum+saya+mau+pesan+Terimakasih&app_absent=0" target="_blank">
                                                            <div type="button" class="btn btn-blue"
                                                                style="background-color: #22B43C;color: white; border-radius: 15px; font-weight: 400;padding: 6px; font-size: 12px;">
                                                                <span> <i class="fa fa-map-signs"
                                                                        aria-hidden="true"></i></span> Whatsapp
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
