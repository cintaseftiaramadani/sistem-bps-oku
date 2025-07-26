<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">

  @php
      $user = Auth::user();
      $dashboardRoute = $user && $user->role === 'admin' ? route('dashboard_admin') : route('dashboard_pegawai');
  @endphp

  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('beranda') }}">
        <img src="{{ asset("assets/img/logos/bps.jpg") }}" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">BPS Kabupaten Ogan Komering Ulu</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">

      <li class="nav-item">
        @php $active = Request::is('beranda') ? 'active' : ''; @endphp
        <a class="nav-link {{ $active }}" href="{{ url('beranda') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-shop {{ $active ? 'text-white' : 'text-dark' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">BERANDA</span>
        </a>
      </li>

      <li class="nav-item">
        @php $active = Request::is('menu_akun') ? 'active' : ''; @endphp
        <a class="nav-link {{ $active }}" href="{{ url('menu_akun') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-collection {{ $active ? 'text-white' : 'text-dark' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">LU BACA</span>
        </a>
      </li>

      <li class="nav-item">
        @php $active = Request::is('menu_triwulan') ? 'active' : ''; @endphp
        <a class="nav-link {{ $active }}" href="{{ url('menu_triwulan') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-check-bold {{ $active ? 'text-white' : 'text-dark' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">SIBUK KERJA</span>
        </a>
      </li>

      <li class="nav-item">
        @php $active = Request::is('postingan') ? 'active' : ''; @endphp
        <a class="nav-link {{ $active }}" href="{{ url('postingan') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-image {{ $active ? 'text-white' : 'text-dark' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">GALERI</span>
        </a>
      </li>

      <li class="nav-item">
        @php 
          $active = ($user && $user->role === 'admin' && Request::is('dashboard_admin')) 
                   || ($user && $user->role === 'pegawai' && Request::is('dashboard_pegawai')) ? 'active' : ''; 
        @endphp
        <a class="nav-link {{ $active }}" href="{{ $dashboardRoute }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-chart-bar-32 {{ $active ? 'text-white' : 'text-dark' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">DASHBOARD</span>
        </a>
      </li>

      <li class="nav-item">
        @php $active = Request::is('tentang_kami') ? 'active' : ''; @endphp
        <a class="nav-link {{ $active }}" href="{{ url('tentang_kami') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 {{ $active ? 'text-white' : 'text-dark' }} text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">TENTANG KAMI</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
