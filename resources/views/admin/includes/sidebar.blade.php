{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class = "nav-item">
            <a href="{{route('warga.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data Warga
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('kegiatan.index')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('laporan')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-header">Form</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Input Warga
              </p>
            </a>
          </li>
          <li class="nav-header">Pengaturan</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Akun
              </p>
            </a>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside> --}}

  <div id="sidebar-wrapper">
    <div class="list-group list-group-flush">
        <span class="right-nav-text">MENU</span>
        <a href="presensi/dashboard'"
            class="list-group-item list-group-item-action active {{ Request::is('presensi/dashboard') ? 'active' : '' }}"><span
                class="icon-dashboard" aria-hidden="true"></span>
            <img src="{{url('presensi/images/icon/dashboard.svg')}}" style="margin-right: 18px;" alt="">
            Dashboard </a>
        <a href="{{route('warga.index')}}"
            class="list-group-item list-group-item-action {{ Request::is('warga.index') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{url('presensi/images/icon/data-warga.svg')}}" style="margin-right: 18px;" alt="">
            Data Warga</a>
        <a href="{{route('kegiatan.index')}}"
            class="list-group-item list-group-item-action {{ Request::is('kegiatan.*') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{url('presensi/images/icon/kegiatan.svg')}}" style="margin-right: 18px;" alt="">
            Kegiatan</a>
        <a href="#"
            class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{url('presensi/images/icon/media.svg')}}" style="margin-right: 18px;" alt="">
            Media Dakwah</a>
        <br>
        <span class="right-nav-text">AKUN</span>
        <a href=""
            class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                class="icon-profile" aria-hidden="true"></span>
            <img src="{{url('presensi/images/icon/profile.svg')}}" style="margin-right: 18px;" alt="">
            Profile</a>
        <a href="presensi/agencies"
            class="list-group-item list-group-item-action {{ Request::is('presensi/agencies') ? 'active' : '' }}"><span
                class="icon-setting" aria-hidden="true"></span>
            <img src="{{url('presensi/images/icon/logout.svg')}}" style="margin-right: 18px;" alt="">
            Logout</a>
    </div>
</div>