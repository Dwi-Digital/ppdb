<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">


        <ul class="menu-inner">

            <!-- Dashboards -->
            <li class="menu-item">
                <a href="/home" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div class="text-truncate" data-i18n="Beranda">Beranda</div>
                </a>
            </li>

            {{-- halaman cpd --}}
            @if (Auth::check() && Auth::user()->role == 'cpd')
                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Calon Peserta Didik</span>
                </li>
                <li class="menu-item">
                    <a href="/app-access-cpd" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-data"></i>
                        <div class="text-truncate">Profil CPD</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/app-access-cpd-pengumuman" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-volume-full"></i>
                        <div class="text-truncate">Pengumuman</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-barcode"></i>
                        <div class="text-truncate">unicCode <span class="badge bg-label-danger">{{ Auth::user()->unicCode}}</span></div>
                    </a>
                </li>
            @endif

        </ul>


    </div>
</aside>
<!-- / Menu -->
