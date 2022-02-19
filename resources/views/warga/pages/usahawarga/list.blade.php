@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="dashboard-heading">
                        <h5 class="dashboard-title">
                            Usaha Warga
                        </h5>
                        <br>
                        <div class="dashboard-content">
                            <div class="row">
                                @foreach ($usaha as $item)
                                <div class="col-lg-3 col-6">
                                    <div class="mb-5"
                                        style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                        <img src="https://asset.kompas.com/crops/BVjJMq0S-09k36xhJjqDexjJBQ8=/116x0:961x563/750x500/data/photo/2021/02/23/6034de156196c.jpg"
                                            alt="" style="border-radius: 5px;">
                                        <br> <br>
                                        <p style="font-size: 14px;"> <b>{{$item->nama}} </b> </p>
                                        <p style="font-size: 10px;"><span><i class="fa fa-map-pin"
                                                    aria-hidden="true"></i></span> {{$item->alamat}}</p>
                                        <a href="{{$item->maps}}" target="_blank"> 
                                            <div type="button" class="btn btn-blue"
                                                style="background-color: #F73A0B;color: white; border-radius: 15px; font-weight: 400;padding: 6px; font-size: 12px;">
                                                <span> <i class="fa fa-map-signs" aria-hidden="true"></i></span> Lokasi 
                                            </div>
                                        </a>
                                        <a href="https://api.whatsapp.com/send/?phone={{$item->telp}}">
                                            <div type="button" class="btn btn-blue"
                                                style="background-color: #22B43C;color: white; border-radius: 15px; font-weight: 400;padding: 6px; font-size: 12px;">
                                                <span> <i class="fa fa-map-signs" aria-hidden="true"></i></span> Whatsapp
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

@endsection
