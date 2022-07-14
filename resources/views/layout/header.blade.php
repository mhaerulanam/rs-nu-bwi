<!--Header Upper-->
<section class="header-uper">
    <div class="container clearfix">
        <div class="logo">
            <figure>
                <a href="index.html">
                    <img src="{{ asset('assets/logo/logo-rs-nu-bwi.png') }}" width="50" style="margin: 16px"
                        alt="">
                </a>
            </figure>
        </div>
    </div>
</section>
<!--Header Upper-->


<!--Main Header-->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {{-- <li class="dropdown">
                    <a href="#" class="dropbtn">Profil Rumah Sakit</a>
                    <ul class="dropdown-content">
                        <a href="#">Anggota</a>
                        <a href="#">Buku</a>
                        <a href="#">Kategori Buku</a>
                    </ul>
                </li> --}}
                <li class="{{ Request::segment(1) == '' || Request::segment(1) == 'beranda' ? 'active' : '' }}">
                    <a href="/beranda">Beranda</a>
                </li>
                <li class="dropdown {{ Request::segment(2) == 'sejarah' ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false">Profile RS <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="{{ Request::segment(2) == 'sejarah' ? '' : 'light-style' }}"
                                href="/user/sejarah">Sejarah</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a class="light-style" href="">Visi, Misi & Strategi</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a class="light-style" href="">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Informasi</a>
                </li>
                <li>
                    <a href="#">Fasilitas</a>
                </li>
                <li>
                    <a href="#">Konsultasi</a>
                </li>
                <li>
                    <a href="#">Homecare</a>
                </li>
                {{-- <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                                    <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="#">One more separated link</a>
                                    </li>
                            </ul>
                        </li> --> --}}
            </ul>
            @if (Auth::user() && Auth::user()->role == 2)
                <ul class="nav navbar-nav" style="float:right">
                    <li class="dropdown {{ Request::segment(2) == 'sejarah' ? 'active' : '' }} float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="/upload/admin/default.png" alt class="w-px-40 h-auto rounded-circle"
                                width="30" style="position: relative; margin-right:10px" />
                            Anam
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!--End Main Header -->
