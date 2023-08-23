<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src ml-auto" style="height: 10vh; background: url('https://1.bp.blogspot.com/-I9AVBU9-qQY/WEkLi5XgFcI/AAAAAAAABUk/UDmaV2ZQrUA0GdSw76izMQAuLH2F-pa0wCLcB/s1600/Logo%2BProvinsi%2BKalimantan%2BTimur.png'); background-size: 10vh; background-position: center; background-repeat: no-repeat;"></div>
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
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
        </div>
        <div class="app-header-right">
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left  ml-3 mr-3 header-user-info">
                            <div class="widget-heading">
                                <?php echo e(Auth::user()->name); ?>

                            </div>
                            <div class="widget-subheading">
                                <?php echo e(Auth::user()->email); ?>

                            </div>
                        </div>
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <img width="42" height="42" class="rounded-circle"
                                        src="<?php echo e(asset('Pictures/default.jpg')); ?>" alt="">
                                    <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                </a>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu dropdown-menu-right">
                                    <button type="button" tabindex="0" class="dropdown-item">Pengaturan Akun</button>
                                    <a href="<?php echo e(route('logout')); ?>" tabindex="0" class="dropdown-item">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /mnt/d/#Ricky's/Code/eboss/resources/views/Layouts/Navbar.blade.php ENDPATH**/ ?>