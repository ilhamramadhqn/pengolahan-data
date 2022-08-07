<aside id="sidebar-wrapper">
  <div class="sidebar-brand mt-3 mb-2">
            <a href="{{ url('/home') }}">
                <span class="brand-title">
                    <img src="{{ asset('assets/icons/L5.png') }}" width="130" alt="">
                </span>
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}">
                <span class="brand-title">
                    <img src="{{ asset('assets/icons/L4.png') }}" width="30" alt="">
                </span>
            </a>
          </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ request()->is('/home') ? 'active' : '' }}">
      <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
    </li>
    
    <li class="menu-header">Master Data Pengguna</li>
    <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-check"></i> <span>Kelola Pengguna</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="/Data-Admin"><i class="fa fa-user-clock"></i>Data Admin</a></li>
        <li><a class="nav-link" href="/Data-Dekan"><i class="fa fa-user-graduate"></i>Data Dekan</a></li>
        <li><a class="nav-link" href="/Data-Dosen"><i class="fa fa-user"></i>Data Dosen</a></li>
        <li><a class="nav-link" href="/Data-Mahasiswa"><i class="fa fa-user"></i>Data Mahasiswa</a></li>
      </ul>
      <li class="{{ request()->is('/Anggota') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/Anggota') }}"><i class="fas fa-address-card"></i> <span>Anggota</span></a>
      </li>
    </li>
    

    <li class="menu-header">Master Data Rekapitulasi</li>
    <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Master Rekapitulasi</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="/Fakultas"><i class="fa fa-file"></i>Fakultas</a></li>
        <li><a class="nav-link" href="/Program-Studi"><i class="fa fa-file"></i>Program Studi</a></li>
        <li><a class="nav-link" href="/Jenis-Publikasi"><i class="fa fa-file"></i>Jenis Publikasi</a></li>
        <li><a class="nav-link" href="/Jenis-Jurnal"><i class="fa fa-file"></i>Jenis Jurnal</a></li>
        <li><a class="nav-link" href="/Semester"><i class="fa fa-file"></i>Semester</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Master Data</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="/Mitra"><i class="fa fa-file"></i>Mitra</a></li>
        <li><a class="nav-link" href="/Dosen"><i class="fa fa-file"></i>Dosen</a></li>
        <li><a class="nav-link" href="/Mahasiswa"><i class="fa fa-file"></i>Mahasiswa</a></li>
        <li><a class="nav-link" href="/Jenis-HKI"><i class="fa fa-file"></i>Jenis HKI</a></li>
        <li><a class="nav-link" href="/Sumber"><i class="fa fa-file"></i>Sumber Dana</a></li>
        <li><a class="nav-link" href="/Pelaksana"><i class="fa fa-file"></i>Pelaksana</a></li>
        <li><a class="nav-link" href="/Pencipta"><i class="fa fa-file"></i>Pencipta</a></li>
        <li><a class="nav-link" href="/Penulis"><i class="fa fa-file"></i>Penulis</a></li>
        </ul>
    </li>

    <li class="menu-header">Daftar Penelitian</li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Penelitian') }}"><i class="fas fa-book"></i> <span>Daftar Penelitian</span></a>
    </li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Artikel') }}"><i class="fas fa-book"></i> <span>Artikel</span></a>
    </li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Jurnal') }}"><i class="fas fa-book"></i> <span>Jurnal</span></a>
    </li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Pengabdian-Masyarakat') }}"><i class="fas fa-users"></i> <span>Pengabdian Masyarakat</span></a>
    </li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/HKI') }}"><i class="fas fa-list-alt"></i> <span>HKI</span></a>
    </li>
<!-- 
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Rekapitulasi-penelitian') }}"><i class="fas fa-book"></i> <span>Rekapitulasi Penelitian</span></a>
    </li>

    <li class="menu-header">Daftar Pengabdian Masyarakat</li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Rekapitulasi-pengabdian-masyarakat') }}"><i class="fas fa-book"></i> <span>Rekapitulasi PPM</span></a>
    </li>

    <li class="menu-header">Daftar HKI</li>
    <li class="{{ request()->is('/') ? : '' }}">
      <a class="nav-link" href="{{ url('/Rekapitulasi-HKIt') }}"><i class="fas fa-book"></i> <span>Rekapitulasi HKI</span></a>
    </li> -->

  </ul>
</aside>
