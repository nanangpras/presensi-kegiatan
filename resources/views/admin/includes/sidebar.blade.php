<div id="sidebar-wrapper">
    @if (Auth::user()->role == 'admin')

    <div class="list-group list-group-flush">
        <span class="right-nav-text">MENU</span>
        <a href="{{url('/admin')}}"
            class="list-group-item list-group-item-action active {{ Request::is('presensi/dashboard') ? 'active' : '' }}"><span
                class="icon-dashboard" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/dashboard.svg') }}" style="margin-right: 18px;" alt="">
            Dashboard </a>

        <a href="#"
            class="list-group-item list-group-item-action {{ Request::is('warga.index') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/pengumuman2.svg') }}" style="margin-right: 18px;" alt="">
            Pengumuman</a>
        <a href="{{ route('warga.index') }}"
            class="list-group-item list-group-item-action {{ Request::is('warga.index') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/master-data.svg') }}" style="margin-right: 18px;" alt="">
            Master Data</a>

        {{-- #### Collaps --}}
        <button class="list-group-item list-group-item-action dropdown-btn " style="display: block"> <span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/presensi.svg') }}" style="margin-right: 18px;" alt=""> Master
            Kegiatan
        </button>
        <div class="dropdown-container">

            <a href="{{ route('kegiatan.index') }}" class="list-group-item list-group-item-action"> <span></span>
                - Presensi Kajian</a>
            <a href="{{ route('kegiatan.index') }}" class="list-group-item list-group-item-action"> <span></span>
                - Presensi Elemen</a>
            <a href="{{ route('donor.index') }}" class="list-group-item list-group-item-action"> <span></span>
                - Presensi Donor </a>
            <a href="{{ route('kegiatan.kurban') }}" class="list-group-item list-group-item-action"> <span></span>
                - Presensi Qurban</a>
        </div>
        <a href="#"
            class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/media.svg') }}" style="margin-right: 18px;" alt="">
            Media Dakwah</a>
        <a href="{{route('usaha-warga.list')}}"
            class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/usaha.svg') }}" style="margin-right: 18px;" alt="">
            Usaha Warga</a>

        <span class="right-nav-text">Data</span>
        <a href="{{ route('element.index') }}"
            class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                class="icon-profile" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/tugas.svg') }}" style="margin-right: 18px;" alt="">
            Elements</a>
        {{-- <a href="#"
            class="list-group-item list-group-item-action {{ Request::is('presensi/agencies') ? 'active' : '' }}"><span
                class="icon-setting" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/profile.svg') }}" style="margin-right: 18px;" alt="">
            Kategori</a> --}}
        <span class="right-nav-text">AKUN</span>
        <a href="{{ route('user.index') }}"
            class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                class="icon-profile" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/akun.svg') }}" style="margin-right: 18px;" alt="">
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
        <a href="{{url('/warga')}}"
            class="list-group-item list-group-item-action active {{ Request::is('presensi/dashboard') ? 'active' : '' }}"><span
                class="icon-dashboard" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/dashboard.svg') }}" style="margin-right: 18px;" alt="">
            Dashboard </a>

        <a href="{{route('presensi.warga')}}"
            class="list-group-item list-group-item-action {{ Request::is('presensi/warga') ? 'active' : '' }}"><span
                class="icon-dashboard" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/kegiatan.svg') }}" style="margin-right: 18px;" alt="">
            Presensi </a>

        {{-- <a href="{{ route('kegiatan.index') }}"
            class="list-group-item list-group-item-action {{ Request::is('kegiatan.*') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/kegiatan.svg') }}" style="margin-right: 18px;" alt="">
            Kegiatan</a> --}}
        <a href="#"
            class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/media.svg') }}" style="margin-right: 18px;" alt="">
            Media Dakwah</a>
        <a href="{{route('maisah.list')}}"
            class="list-group-item list-group-item-action {{ Request::is('presensi/catalogs') ? 'active' : '' }}"><span
                class="icon-katalog" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/media.svg') }}" style="margin-right: 18px;" alt="">
            Usaha Warga</a>
        <br>

        <span class="right-nav-text">AKUN</span>
        <a href="{{ route('profile.index') }}"
            class="list-group-item list-group-item-action {{ Request::is('presensi/profile/me') ? 'active' : '' }}"><span
                class="icon-profile" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/akun.svg') }}" style="margin-right: 18px;" alt="">
            Profile</a>
        <a href="#"
            class="list-group-item list-group-item-action {{ Request::is('presensi/agencies') ? 'active' : '' }}"><span
                class="icon-setting" aria-hidden="true"></span>
            <img src="{{ url('presensi/images/icon/logout.svg') }}" style="margin-right: 18px;" alt="">
            Logout</a>
    </div>
    @endif

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
    </script>
</div>