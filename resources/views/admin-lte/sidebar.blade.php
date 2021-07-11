 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('/beranda') }}" class="brand-link">
         <img src="{{ url('assets/logo/logo.png') }}" width="200px" alt="">
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">

                 {{-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ auth()->user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                 aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         @role('admin')
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
             data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                   <li class="nav-item">
                     <a href="/beranda" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Beranda
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/produk" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Produk
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="../widgets.html" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Penetasan
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">Master Data</li>
                 <li class="nav-item">
                     <a href="../widgets.html" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Data User
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="../widgets.html" class="nav-link">
                         <i class="nav-icon fas fa-edit"></i>
                         <p>
                             Data Stok Produk
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">Laporan</li>
                 <li class="nav-item">
                     <a href="../widgets.html" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Laporan Transaksi
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="../widgets.html" class="nav-link">
                         <i class="nav-icon fas fa-edit"></i>
                         <p>
                             Laporan Stok
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">Auth User</li>
                 <li class="nav-item">
                     <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">

                     <i class="nav-icon fas fa-door-open"></i>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                     <p>
                         Logout
                         <!-- <span class="right badge badge-danger">New</span> -->
                     </p>
                 </a>
             </li>

         </ul>
     </nav>
     <!-- /.sidebar-menu -->
     @endrole

 </div>
