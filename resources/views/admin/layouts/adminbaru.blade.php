<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="data warga mta perwakilan daerah istimewa yogyakarta" />
    <meta name="author" content="poweredby.kodekopi.com" />

    <title>Dashboard Data Warga MTA DIY </title>

    @include('admin.includes.style')
</head>

<body>
    <!-- Navbar-->
    @include('admin.includes.topnavbar')



    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right" data-aos-delay="300">
            <!-- Side Bar-->
            @include('admin.includes.sidebar')


            <!-- Page Content -->
            <div id="page-content-wrapper">
                @yield('content')
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin keluar dari aplikasi?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <a type="button" class="btn btn-primary" data-dismiss="modal" href="{{ route('logout')}}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
								        <span>Ya</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout')}}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stack('before-scripts')
    @include('admin.includes.scripts')
    @stack('after-scripts')

</body>

</html>