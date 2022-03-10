@extends('admin.layouts.adminbaru')
@section('content')
    <div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="container-fluid">
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <h1 style="text-align: center">Data Anda tidak ditemukan</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="mb-5"
                            style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                            <div class="row">
                                <div class="col-12">
                                    <a type="button" href="{{ route('dashboard.warga') }}" class="btn btn-info btn-lg btn-block">Kembali</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="mb-5"
                            style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                            <div class="row">
                                <div class="col-12">
                                    <a type="button" href="{{ route('dashboard.warga') }}" class="btn btn-warning btn-lg btn-block">Hubungi Admin</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    
                </div>

            </div>
        </div>
    </div>
@endsection
