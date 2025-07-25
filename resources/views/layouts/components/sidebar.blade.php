@php
    $menus=[
        (object) [
            'tittle' => 'Dashboard',
            'path' => '/',
            'icon' => 'fas fa-th',
        ],
        (object) [
            'tittle' => 'Produk',
            'path' => 'products',
            'icon' => 'fas fa-th',
        ],
    ]
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('templates/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('templates/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            {{-- menganggap menu yang diambil dari $menus adalah array objek jadi ketika mau nambah menu, cukup tambahkan di array $menus--}}
            @foreach ($menus as $menu)
            <li class="nav-item">
                {{-- jika path yang ada di $menu sama dengan path yang sedang aktif, maka tambahkan class active --}}
                <a href="{{ $menu->path[0] !=='/' ? '/' . $menu->path : $menu->path }}" class="nav-link {{request()->path() ===$menu->path ? 'active' : '' }}">
                    {{-- menampilkan icon dari menu --}}
                    <i class="nav-icon {{ $menu->icon }}"></i>
                    <p>
                    {{ $menu->tittle }}
                    {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>