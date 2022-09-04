<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="#" class="app-brand-link">
                    <img src="{{ asset('assets/logo/logo-rs-nu-bwi.png') }}" width="60"
                        style="margin: 16px 16px 20px 16px" alt="">
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            @if (Auth::user()->role == 1)
                <ul class="menu-inner py-1">
                    <!-- Layouts -->
                    <li
                        class="{{ Request::segment(1) == '' ||
                        Request::segment(1) == 'banner' ||
                        Request::segment(1) == 'fasilitas' ||
                        Request::segment(1) == 'setting' ||
                        Request::segment(1) == 'article'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'banner' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/banner" class="menu-link">
                                    <div data-i18n="Without menu">Banner</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'fasilitas' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/fasilitas" class="menu-link">
                                    <div data-i18n="Without menu">Fasilitas</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'article' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/article" class="menu-link">
                                    <div data-i18n="Without menu">Artikel</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'setting' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/setting" class="menu-link">
                                    <div data-i18n="Without menu">Setting</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="{{ Request::segment(1) == 'sejarah' ||
                        Request::segment(1) == 'visimisi' ||
                        Request::segment(1) == 'struktur' ||
                        Request::segment(1) == 'staf'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Profile RS</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'sejarah' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/sejarah" class="menu-link">
                                    <div data-i18n="Without menu">Sejarah</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'visimisi' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/visimisi" class="menu-link">
                                    <div data-i18n="Without menu">Visi Misi Strategi</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'staf' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/staf" class="menu-link">
                                    <div data-i18n="Without menu">Staf</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'struktur' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/struktur" class="menu-link">
                                    <div data-i18n="Without menu">Struktur Organisasi</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="{{ Request::segment(1) == 'dokter' ||
                        Request::segment(1) == 'alur-inap' ||
                        Request::segment(1) == 'alur-jalan' ||
                        Request::segment(1) == 'alur-igd' ||
                        Request::segment(1) == 'bpjs' ||
                        Request::segment(1) == 'jadwal-kegiatan'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-detail"></i>
                            <div data-i18n="Analytics">Informasi</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'dokter' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/dokter" class="menu-link">
                                    <div data-i18n="Without menu">Dokter & Jadwal</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'alur-inap' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/alur-inap" class="menu-link">
                                    <div data-i18n="Without menu">Alur Pasien Rawat Inap</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'alur-jalan' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/alur-jalan" class="menu-link">
                                    <div data-i18n="Without menu">Alur Pasien Rawat Jalan</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'alur-igd' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/alur-igd" class="menu-link">
                                    <div data-i18n="Without menu">Alur Pasien IGD</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'bpjs' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/bpjs" class="menu-link">
                                    <div data-i18n="Without menu">BPJS Kesehatan</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'jadwal-kegiatan' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/jadwal-kegiatan" class="menu-link">
                                    <div data-i18n="Without menu">Jadwal Kegiatan</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="{{ Request::segment(1) == 'fasilitas-poli' ||
                        Request::segment(1) == 'fasilitas-igd' ||
                        Request::segment(1) == 'fasilitas-inap' ||
                        Request::segment(1) == 'fasilitas-penunjang'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div data-i18n="Analytics">Fasilitas</div>
                        </a>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'fasilitas-poli' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/fasilitas-poli" class="menu-link">
                                    <div data-i18n="Without menu">Poli</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'fasilitas-igd' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/fasilitas-igd" class="menu-link">
                                    <div data-i18n="Without menu">IGD</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'fasilitas-inap' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/fasilitas-inap" class="menu-link">
                                    <div data-i18n="Without menu">Kamar Rawat Inap</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'fasilitas-penunjang' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/fasilitas-penunjang" class="menu-link">
                                    <div data-i18n="Without menu">Penunjang Medis</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ Request::segment(1) == 'galeri' ? 'menu-item active' : 'menu-item' }}">
                        <a href="/galeri" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Analytics">Galeri</div>
                        </a>
                    </li>

                    <li
                        class="{{ Request::segment(1) == 'master-pasien' ||
                        Request::segment(1) == 'master-diagnosa' ||
                        Request::segment(1) == 'master-pegawai' ||
                        Request::segment(1) == 'master-layanan'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Analytics">Master</div>
                        </a>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'master-pasien' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/master-pasien" class="menu-link">
                                    <div data-i18n="Without menu">Master Pasien</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'master-pegawai' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/master-pegawai" class="menu-link">
                                    <div data-i18n="Without menu">Master Pegawai</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'master-diagnosa' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/master-diagnosa" class="menu-link">
                                    <div data-i18n="Without menu">Master Diagnosa</div>
                                </a>
                            </li>
                        </ul>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'master-layanan' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/master-layanan" class="menu-link">
                                    <div data-i18n="Without menu">Master Layanan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="{{ Request::segment(1) == '' ||
                        Request::segment(1) == 'konsultasi-admin' ||
                        Request::segment(1) == 'homecare-admin'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div data-i18n="Analytics">Transaksi</div>
                        </a>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'konsultasi-admin' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/konsultasi-admin" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-chat"></i>
                                    <div data-i18n="Analytics">Konsultasi</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'homecare-admin' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/homecare-admin" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-support"></i>
                                    <div data-i18n="Analytics">Homecare</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="menu-inner py-1">
                    <!-- Layouts -->
                    <li
                        class="{{ Request::segment(1) == '' ||
                        Request::segment(1) == 'banner' ||
                        Request::segment(1) == 'fasilitas' ||
                        Request::segment(1) == 'article'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'banner' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/banner" class="menu-link">
                                    <div data-i18n="Without menu">Banner</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'fasilitas' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/fasilitas" class="menu-link">
                                    <div data-i18n="Without menu">Fasilitas</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li class="{{ Request::segment(1) == 'article' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/article" class="menu-link">
                                    <div data-i18n="Without menu">Artikel</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="{{ Request::segment(1) == '' ||
                        Request::segment(1) == 'konsultasi-admin' ||
                        Request::segment(1) == 'homecare-admin'
                            ? 'menu-item active open'
                            : 'menu-item' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div data-i18n="Analytics">Transaksi</div>
                        </a>

                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'konsultasi-admin' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/konsultasi-admin" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-chat"></i>
                                    <div data-i18n="Analytics">Konsultasi</div>
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-sub">
                            <li
                                class="{{ Request::segment(1) == 'homecare-admin' ? 'menu-item active' : 'menu-item' }}">
                                <a href="/homecare-admin" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-support"></i>
                                    <div data-i18n="Analytics">Homecare</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endif
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <div class="navbar-nav align-items-center">
                        <div class="nav-item d-flex align-items-center">
                            <h4>
                                Rumah Sakit Nahdlatul Ulama Banyuwangi
                            </h4>
                        </div>
                    </div>

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="/upload/admin/default.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="/upload/admin/default.png" alt
                                                        class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">{{ Auth::user()->email }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
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
                        <!--/ User -->
                    </ul>
                </div>
            </nav>

            <!-- / Navbar -->
