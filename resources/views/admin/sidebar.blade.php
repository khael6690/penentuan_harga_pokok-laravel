@php
    $uri = $_SERVER['REQUEST_URI'];
@endphp
<!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url')) ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Menu</li>

      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url').'/perusahaan') ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/perusahaan">
          <i class="fa-solid fa-city"></i>
          <span>Pengaturan Perusahaan</span>
        </a>
      </li>

      <li class="nav-heading">Data Master</li>
      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url').'/satuan') ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/satuan">
          <i class="fa-solid fa-list"></i>
          <span>Satuan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url').'/bahan') ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/bahan">
          <i class="fa-solid fa-list"></i>
          <span>Bahan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url').'/produk') ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/produk">
          <i class="fa-solid fa-list"></i>
          <span>Produk</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url').'/tenaga_kerja') ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/tenaga_kerja">
          <i class="fa-solid fa-users-gear"></i>
          <span>Tenaga Kerja</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?=($uri === Session::get('base_url').'/pelanggan') ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/pelanggan">
          <i class="fa-solid fa-cart-plus"></i>
          <span>Pelanggan</span>
        </a>
      </li>

      <li class="nav-heading">Produksi</li>
      <li class="nav-item">
        <a class="nav-link <?=(preg_match('/produksi/',$uri)) ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/produksi">
          <i class="fa-solid fa-list"></i>
          <span>Produksi</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->
