<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down"
        id="navbar-wrapper">
        <div class="container-fluid">
            <div class="btn btn-white d-toggle-sidebar" id="menu-toggle">
                <span class="navbar-toggler-icon"></span>
            </div>
            <a href="#" class="navbar-brand mt-3">

                <h4 style="font-weight: 700;color: #f93a0b;">Dashboard Warga MTA DIY</h4>
            </a>
            <a href="" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive"
                style="border: none">
                <img src="{{url('presensi/images/png/img-user.png')}}" alt="" class="rounded-circle mt-3 profile-picture" />


            </a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="/index.html" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href="/categories.html" class="nav-link"></a>
                    </li>
                    <li class="nav-item">
                        <a href="/index.html" class="nav-link"></a>
                    </li>
                </ul>
                <!-- Dekstop Menu -->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                    <!-- Dropdown Notification -->
                    <li class="nav-item dropdown mr-1">
                        <a href="" class="nav-link d-inline-block " type="button"
                            class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static"
                            aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle mr-2 profile-picture" src="{{url('presensi/images/icon/notive.png')}}" alt="" />
                        </a>

                        <ul class="dropdown-menu" style="width: 450px; margin-left: -250px; margin-top: 15px;">
                            <li class="head">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12" style="padding: 0 30px 10px 30px">
                                        <span>Notifikasi</span>
                                        <a href="" class="float-right" style="text-decoration: none;">Tandai Semua
                                            dibaca</a>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="notification-item p-3">
                                <a href="" class="d-flex notive">
                                    <div class="mr-3 mb-auto text-center">
                                        <img src="{{url('images/square_pink.svg')}}" alt=""
                                            style="max-width: 160px;max-height: 65px;">
                                    </div>
                                    <div class="notification-content mb-auto">
                                        <p style="
                                            font-size: 13px;
                                            color:#6C6866;
                                            ">
                                            07:39 WIB . Inventaris
                                        </p>
                                        <h6 style="margin-top: -10px;">Stok Buku SBBA Habis!!</h6>
                                        <p style="color:#6C6866;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Arcu a lorem massa nunc, vel. Erat aliquet.</p>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-item p-3">
                                <a href="" class="d-flex notive">
                                    <div class="mr-3 mb-auto text-center">
                                        <img src="images/square_pink.svg" alt=""
                                            style="max-width: 160px;max-height: 65px;">
                                    </div>
                                    <div class="notification-content mb-auto">
                                        <p style="
                                            font-size: 13px;
                                            color:#6C6866;
                                            ">
                                            07:39 WIB . Inventaris
                                        </p>
                                        <h6 style="margin-top: -10px;">Stok Buku SBBA Habis!!</h6>
                                        <p style="color:#6C6866;">Lorem ipsum dolor sit amet, consectetur adipiscing
                                            elit. Arcu a lorem massa nunc, vel. Erat aliquet.</p>
                                    </div>
                                </a>
                            </li>


                            <div class="dropdown-divider"></div>
                            <li class="float-right" style="padding: 0px 30px">
                                <a href="">Lihat selengkapnya</a>
                            </li>

                        </ul>
                    </li>
                    <!-- Close Dropdown Notification -->
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="{{url('presensi/images/png/img-user.png')}}" alt=""
                                class="rounded-circle mr-2 profile-picture" /> {{Auth::user()->name}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="" class="nav-link d-inline-block ">
                            <img src="super-admin/images/dashboard-exit.png" alt="" />
                        </a> -->
                        <!-- Button trigger modal -->
                        <div type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            style="background-color: white; border-color: white;;">
                            <img class="rounded-circle mr-2 profile-picture" src="{{url('presensi/images/icon/exit.png')}}" alt="" />
                        </div>

                    </li>



                </ul>
                <ul class="navbar-nav d-block d-lg-none">
                    <li class="nav-item">
                        <a href="#" class="nav-link"> Notifikasi </a>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link"> {{Auth::user()->name}} </a>
                    </li>
                    <li class="nav-item " data-toggle="modal" data-target="#exampleModal">
                        <a href="#" class="nav-link d-inlink-block"> Keluar </a>
                    </li>
                </ul>

            </div>
        </div>

    </nav>