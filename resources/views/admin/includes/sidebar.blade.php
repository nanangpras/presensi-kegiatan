  <div id="sidebar-wrapper">
      @if (Auth::user()->role == 'admin')
          
      <div class="list-group list-group-flush">
          <span class="right-nav-text">MENU</span>
          <a href="presensi/dashboard'"
              class="list-group-item list-group-item-action active {{ Request::is('presensi/dashboard') ? 'active' : '' }}"><span
                  class="icon-dashboard" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/dashboard.svg') }}" style="margin-right: 18px;" alt="">
              Dashboard </a>
          <a href="{{ route('warga.index') }}"
              class="list-group-item list-group-item-action {{ Request::is('warga.index') ? 'active' : '' }}"><span
                  class="icon-katalog" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/data-warga.svg') }}" style="margin-right: 18px;" alt="">
              Data Warga</a>
          <a href="{{ route('kegiatan.index') }}"
              class="list-group-item list-group-item-action {{ Request::is('kegiatan.*') ? 'active' : '' }}"><span
                  class="icon-katalog" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/kegiatan.svg') }}" style="margin-right: 18px;" alt="">
              Kegiatan</a>
          <a href="#"
              class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                  class="icon-katalog" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/media.svg') }}" style="margin-right: 18px;" alt="">
              Media Dakwah</a>
          <br>
          <span class="right-nav-text">Data</span>
          <a href="{{ route('element.index') }}"
              class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                  class="icon-profile" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/profile.svg') }}" style="margin-right: 18px;" alt="">
              Elements</a>
          <a href="#"
              class="list-group-item list-group-item-action {{ Request::is('presensi/agencies') ? 'active' : '' }}"><span
                  class="icon-setting" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/profile.svg') }}" style="margin-right: 18px;" alt="">
              Kategori</a>
          <span class="right-nav-text">AKUN</span>
          <a href="{{ route('user.index') }}"
              class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                  class="icon-profile" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/profile.svg') }}" style="margin-right: 18px;" alt="">
              Profile</a>
          <a href="#"
              class="list-group-item list-group-item-action {{ Request::is('presensi/agencies') ? 'active' : '' }}"><span
                  class="icon-setting" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/logout.svg') }}" style="margin-right: 18px;" alt="">
              Logout</a>
      </div>
      @endif
      @if (Auth::user()->role == 'warga')
          
      <div class="list-group list-group-flush">
          <span class="right-nav-text">MENU</span>
          <a href="presensi/dashboard'"
              class="list-group-item list-group-item-action active {{ Request::is('presensi/dashboard') ? 'active' : '' }}"><span
                  class="icon-dashboard" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/dashboard.svg') }}" style="margin-right: 18px;" alt="">
              Dashboard </a>
          
          <a href="{{ route('kegiatan.index') }}"
              class="list-group-item list-group-item-action {{ Request::is('kegiatan.*') ? 'active' : '' }}"><span
                  class="icon-katalog" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/kegiatan.svg') }}" style="margin-right: 18px;" alt="">
              Kegiatan</a>
          <a href="#"
              class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                  class="icon-katalog" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/media.svg') }}" style="margin-right: 18px;" alt="">
              Media Dakwah</a>
          <br>
          
          <span class="right-nav-text">AKUN</span>
          <a href="{{ route('profile.index') }}"
              class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                  class="icon-profile" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/profile.svg') }}" style="margin-right: 18px;" alt="">
              Profile</a>
          <a href="#"
              class="list-group-item list-group-item-action {{ Request::is('presensi/agencies') ? 'active' : '' }}"><span
                  class="icon-setting" aria-hidden="true"></span>
              <img src="{{ url('presensi/images/icon/logout.svg') }}" style="margin-right: 18px;" alt="">
              Logout</a>
      </div>
      @endif
  </div>
