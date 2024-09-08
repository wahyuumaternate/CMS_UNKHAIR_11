 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
     <div class="sidebar-logo">
         <!-- Logo Header -->
         <div class="logo-header" data-background-color="dark">
             <a href="{{ route('dashboard') }}" class="logo">
                 <img src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="navbar brand" class="navbar-brand"
                     height="20" />
                 <h5 class="text-white m-2">CMS UNKHAIR</h5>
             </a>
             <div class="nav-toggle">
                 <button class="btn btn-toggle toggle-sidebar">
                     <i class="gg-menu-right"></i>
                 </button>
                 <button class="btn btn-toggle sidenav-toggler">
                     <i class="gg-menu-left"></i>
                 </button>
             </div>
             <button class="topbar-toggler more">
                 <i class="gg-more-vertical-alt"></i>
             </button>
         </div>
         <!-- End Logo Header -->
     </div>
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <ul class="nav nav-secondary">
                 <li class="nav-item active">
                     <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                         <i class="fas fa-home"></i>
                         <p>Dasbor</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="dashboard">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="../demo1/index.html">
                                     <span class="sub-item">Dashboard 1</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Halaman</h4>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#base">
                         <i class="fas fa-newspaper"></i>
                         <p>Post</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="base">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="{{ route('posts.index') }}">
                                     <span class="sub-item">Semua Posts</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('posts.create') }}">
                                     <span class="sub-item">Tambah Posts</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="components/buttons.html">
                                     <span class="sub-item">Kategori</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="components/gridsystem.html">
                                     <span class="sub-item">Tag</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('media.index') }}">
                         <i class="fas fa-camera"></i>
                         <p>Media</p>

                     </a>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#forms">
                         <i class="fas fa-file"></i>
                         <p>Halaman</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="forms">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="forms/forms.html">
                                     <span class="sub-item">Basic Form</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a href="../../documentation/index.html">
                         <i class="fab fa-facebook-messenger"></i>
                         <p>Komentar</p>
                         <span class="badge badge-secondary">1</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('tema.index') }}">
                         <i class="far fa-window-restore"></i>
                         <p>Tema</p>
                     </a>
                 </li>
                 <li class="nav-section">
                     <span class="sidebar-mini-icon">
                         <i class="fa fa-ellipsis-h"></i>
                     </span>
                     <h4 class="text-section">Pengaturan</h4>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#charts">
                         <i class="fas fa-user-cog"></i>
                         <p>Pengguna</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="charts">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="charts/charts.html">
                                     <span class="sub-item">Chart Js</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="charts/sparkline.html">
                                     <span class="sub-item">Sparkline</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
                 <li class="nav-item">
                     <a data-bs-toggle="collapse" href="#pengaturan">
                         <i class="fas fa-cogs"></i>
                         <p>Pengaturan</p>
                         <span class="caret"></span>
                     </a>
                     <div class="collapse" id="pengaturan">
                         <ul class="nav nav-collapse">
                             <li>
                                 <a href="charts/charts.html">
                                     <span class="sub-item">Umum</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="charts/sparkline.html">
                                     <span class="sub-item">Sparkline</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </li>
             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
