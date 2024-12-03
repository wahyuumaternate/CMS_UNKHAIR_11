<div class="container section">
    <img class="img-fluid" src="{{ asset('hero.jpg') }}" alt="">
</div>
<header id="header" class="header d-flex align-items-center sticky-top ">
    <div class="container navbar position-relative d-flex align-items-center justify-content-between p-2">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('storage/' . $site_logo->value) }}" alt="">
            <h1 class="sitename">{{ $site_name->value }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>

                {{-- @foreach ($menus as $menu)
                    @foreach ($menu->items as $item)
                        <li class="{{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
                            <a class=" {{ ($item->children ?? collect())->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                href="{{ $item->page ? url($item->page->slug) : $item->url }}"
                                {{ ($item->children ?? collect())->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                {{ $item->label }}
                            </a>

                            <!-- First-level dropdown menu -->
                            @if (($item->children ?? collect())->isNotEmpty())
                                <ul class="dropdown-menu">
                                    @foreach ($item->children as $child)
                                        <li
                                            class="{{ ($child->children ?? collect())->isNotEmpty() ? 'dropdown' : '' }}">
                                            <a class=" {{ ($child->children ?? collect())->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                href="{{ $child->page ? url($child->page->slug) : $child->url }}"
                                                {{ ($child->children ?? collect())->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                {{ $child->label }}

                                            </a>

                                            <!-- Second-level dropdown menu -->
                                            @if (($child->children ?? collect())->isNotEmpty())
                                                <ul>
                                                    @foreach ($child->children as $subchild)
                                                        <li>
                                                            <a
                                                                href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">
                                                                {{ $subchild->label }}
                                                            </a>
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
                @endforeach --}}
                <li><a href="/">Home</a></li>

                @foreach ($menus as $menu)
                    @foreach ($menu->items as $item)
                        <li class="{{ $item->children->isNotEmpty() ? 'dropdown' : '' }}">
                            <a href="{{ $item->page ? url($item->page->slug) : $item->url }}"
                                class="{{ $item->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                {{ $item->children->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                {{ $item->label }}
                            </a>

                            <!-- First-level dropdown menu -->
                            @if ($item->children->isNotEmpty())
                                <ul class="dropdown-menu">
                                    @foreach ($item->children as $child)
                                        <li class="{{ $child->children->isNotEmpty() ? 'dropdown' : '' }}">
                                            <a href="{{ $child->page ? url($child->page->slug) : $child->url }}"
                                                class="{{ $child->children->isNotEmpty() ? 'dropdown-toggle' : '' }}"
                                                {{ $child->children->isNotEmpty() ? 'data-toggle=dropdown' : '' }}>
                                                {{ $child->label }}
                                            </a>

                                            <!-- Second-level dropdown menu -->
                                            @if ($child->children->isNotEmpty())
                                                <ul>
                                                    @foreach ($child->children as $subchild)
                                                        <li>
                                                            <a
                                                                href="{{ $subchild->page ? url($subchild->page->slug) : $subchild->url }}">
                                                                {{ $subchild->label }}
                                                            </a>
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

                <li><a href="{{ route('galleries.front') }}">Galleries</a></li>



                {{-- <li><a href="index.html" class="active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="single-post.html">Single Post</a></li>
                <li class="dropdown"><a href="#"><span>Categories</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="category.html">Category 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                        <li><a href="category.html">Category 2</a></li>
                        <li><a href="category.html">Category 3</a></li>
                        <li><a href="category.html">Category 4</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li> --}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <div class="header-social-links">
            {{-- <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
        </div>

    </div>
</header>
