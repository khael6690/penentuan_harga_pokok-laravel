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

      <li class="nav-heading">Produksi</li>
      <li class="nav-item">
        <a class="nav-link <?=(preg_match('/produksi/',$uri)) ? '' : 'collapsed'?>" href="{{Session::get('base_url')}}/produksi">
          <i class="fa-solid fa-list"></i>
          <span>Produksi</span>
        </a>
      </li>


    </ul>

  </aside><!-- End Sidebar-->
