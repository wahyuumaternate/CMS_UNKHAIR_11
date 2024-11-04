 <!-- Preloader Start -->
 <div id="preloader-active">
     <div class="preloader d-flex align-items-center justify-content-center">
         <div class="preloader-inner position-relative">
             <div class="preloader-circle"></div>
             <div class="preloader-img pere-text">
                 <img src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="">
             </div>
         </div>
     </div>
 </div>
 <!-- Preloader Start -->
 <header>
     <!-- Header Start -->
     <div class="header-area">
         <div class="main-header">
             <!-- Top Bar -->
             <div class="header-top black-bg d-none d-sm-block">
                 <div class="container">
                     <div class="col-xl-12">
                         <div class="row d-flex justify-content-between align-items-center">
                             <div class="header-info-left">
                                 <ul>
                                     <li class="title"><span class="flaticon-energy"></span> Trending News</li>
                                     <li>Class property employ ancho red multi level mansion</li>
                                 </ul>
                             </div>
                             <div class="header-info-right">
                                 <ul class="header-date">
                                     <li><span class="flaticon-calendar"></span> Contact: +880166 253 232</li>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Middle Section with Logo and Banner -->
             <div class="header-mid gray-bg">
                 <div class="container">
                     <div class="row d-flex align-items-center">
                         <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                             <div class="logo">
                                 <a href="#"><img src="{{ asset('backend/assets/img/logo-unkhair.png') }}"
                                         alt="Logo" width="70"></a>
                             </div>
                         </div>
                         <div class="col-xl-9 col-lg-9 col-md-9">
                             <div class="header-banner f-right">
                                 <h3>Fakultas Teknik</h3>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- Main Navigation positioned to the left -->
             <div class="header-bottom header-sticky">
                 <div class="container">
                     <div class="row align-items-center">
                         <div class="col-xl-12 col-lg-12 col-md-12">
                             <nav class="navbar navbar-expand-lg navbar-light">
                                 <a class="navbar-brand d-lg-none" href="#"><img
                                         src="{{ asset('backend/assets/img/logo-unkhair.png') }}" alt="Logo"
                                         width="50"></a>
                                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                                     data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                     aria-expanded="false" aria-label="Toggle navigation">
                                     <span class="navbar-toggler-icon"></span>
                                 </button>

                                 <!-- Left-aligned navbar -->
                                 <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                     <ul class="navbar-nav mr-auto"> <!-- Align left with mr-auto -->
                                         @foreach ($menus as $menu)
                                             @foreach ($menu->items as $item)
                                                 <li
                                                     class="nav-item dropdown {{ $item->children->isNotEmpty() ? 'dropdown-submenu' : '' }}">
                                                     <a class="nav-link {{ $item->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                         href="{{ $item->page ? url($item->page->slug) : $item->url }}"
                                                         {{ $item->children->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                         {{ $item->label }}
                                                     </a>
                                                     @if ($item->children->isNotEmpty())
                                                         <ul class="dropdown-menu">
                                                             @foreach ($item->children as $child)
                                                                 <li
                                                                     class="dropdown-submenu {{ $child->children->isNotEmpty() ? 'dropdown' : '' }}">
                                                                     <a class="dropdown-item {{ $child->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                                         href="{{ $child->page ? url($child->page->slug) : $child->url }}"
                                                                         {{ $child->children->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                                         {{ $child->label }}
                                                                     </a>
                                                                     @if ($child->children->isNotEmpty())
                                                                         <ul class="dropdown-menu">
                                                                             @foreach ($child->children as $subchild)
                                                                                 <li><a class="dropdown-item"
                                                                                         href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">{{ $subchild->label }}</a>
                                                                                 </li>
                                                                             @endforeach
                                                                         </ul>
                                                                     @endif
                                                                 </li>
                                                             @endforeach
                                                         </ul>
                                                     @endif
                                                 </li>
                                             @endforeach
                                         @endforeach
                                     </ul>
                                 </div>
                             </nav>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->
 </header>
