<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            @if (Auth::user()->role == 0)
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{route('dashboard-dinas')}}">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-server"></i>
                        Data Pokok Sekolah
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('satuan-harga.index')}}">
                                <i class="metismenu-icon"></i>
                                Satuan Harga
                            </a>
                        </li>
                        <li>
                            <a href="{{route('kode-rekening.index')}}">
                                <i class="metismenu-icon"></i>
                                Kode Rekening
                            </a>
                        </li>
                        <li>
                            <a href="{{route('data-pokok-pendidikan.index')}}">
                                <i class="metismenu-icon"></i>
                                Data Pokok Pendidikan
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('dashboard-dinas')}}">
                        <i class="metismenu-icon pe-7s-like2"></i>
                        Verifikasi Sekolah
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-news-paper"></i>
                        Laporan
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>
                                Anggaran Sekolah
                            </a>
                        </li>
                        {{-- <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Anggaran Pergeseran (Coming soon)
                            </a>
                        </li>
                        <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Anggaran Perubahan (Coming soon)
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Log
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('konfirmasi-data.index')}}">
                                <i class="metismenu-icon"></i>
                                Konfirmasi Data 
                                @if (RDev::CKD() != 0)
                                    <span class="badge badge-pill badge-danger">{{RDev::CKD()}}</span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="elements-icons.html">
                                <i class="metismenu-icon"></i>
                                Status Murni
                            </a>
                        </li>
                        {{-- <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Status Pergeseran (Coming soon)
                            </a>
                        </li>
                        <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Status Perubahan (Coming soon)
                            </a>
                        </li> --}}
                    </ul>
                </li>
            </ul>   
            @endif
            @if (Auth::user()->role == 1)    
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboard</li>
                <li>
                    <a href="{{route('dashboard-dinas')}}" class="">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{route('verifikasi-data-pokok-pendidikan.create')}}">
                        <i class="metismenu-icon pe-7s-like2"></i>
                        Verifikasi Data Pokok Pendidikan
                    </a>
                </li>
                <li>
                    <a href="{{route('penganggaran-dana-bos.index')}}">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Penganggaran Dana BOS
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-note2"></i>
                        Log
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon"></i>
                                Konfirmasi Dinas <span class="badge badge-pill badge-danger">Baru</span>
                            </a>
                        </li>
                        <li>
                            <a href="elements-icons.html">
                                <i class="metismenu-icon"></i>
                                Status Murni
                            </a>
                        </li>
                        {{-- <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Status Pergeseran (Coming soon)
                            </a>
                        </li>
                        <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Status Perubahan (Coming soon)
                            </a>
                        </li> --}}
                    </ul>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>