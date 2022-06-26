@extends('admin.layouts.adminbaru')
@section('content')
<div class="section-content section-dashboard-home aos-init aos-animate" data-aos="fade-up"
data-aos-delay="100">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Dashboard
                </h5>
                <br>
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="mb-5"
                                style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="presensi/images/assets/chart1.png" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h4 style="font-weight: 700; font-size: 30px; "> 2000</h4>
                                        <p style="font-size: 14px;"> Total Warga</p>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="mb-5"
                                style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="presensi/images/assets/chart2.png" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h4 style="font-weight: 700; font-size: 30px; "> 5</h4>
                                        <p style="font-size: 14px;"> Total Kegiatan</p>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="mb-5"
                                style="border-radius: 15px; background-color: white; padding: 20px;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.09));">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="presensi/images/assets/chart3.png" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h4 style="font-weight: 700; font-size: 30px; "> 400</h4>
                                        <p style="font-size: 14px;">Warga Baru</p>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            <!-- Box-->

            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Kegitan Terbaru
                </h5>
                <br>
                <div class="container-fluid table">
                    <div>
                        <table class="table table-striped" id="table-inventaris-book">
                            <thead class="head-table">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="body-table">
                                <tr>
                                    <td>1</td>
                                    <td>Jalan Sehar Se-DIY</td>
                                    <td>300</td>
                                    <td>2 Februari 2022</td>
                                    <td>
                                        <a href="" style="text-decoration: none; color:#3685C8;">
                                            lihat
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <a href="">
                    </a>

                </div>
            </div>
        </div>
        <!--Informasi-->

        <div class="col-lg-3 sidebar-information aos-init" data-aos="fade-up" data-aos-delay="200">
            <div class="dashboard-heading">
                <h5 class="dashboard-title">
                    Media
                </h5>

            </div>
            <section class="news-down">
                <div class="container-fluid">
                    <br>
                    <p>Asset dakwah Brosur dan Mp3</p>
                    <br>
                    <a href="#" style="text-decoration:none ; color: #23120B" class="button">
                        <div class="row">
                            <div class=" col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="row ">
                                    <div
                                        class="col-lg-9 col-md-9 col-sm-9 col-9 card-content-right">
                                        <h6 style="font-size: 14px; font-weight: 600;"> Muhasabah
                                            Bag 1
                                        </h6>
                                        <h6 style="font-size: 12px; font-weight: 300"> 02 April 21 .
                                            Info</h6>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                        <img src="presensi/images/icon/sound.png"
                                            alt="Logo">
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </a>


                </div>
            </section>
        </div>
    </div>
</div>
</div>
@endsection