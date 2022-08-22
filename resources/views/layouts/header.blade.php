@section('header')
<header class="header-desktop2">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap2">
                <div class="logo d-block d-lg-none ">
                    <a href="#">
                        <a href="/admin">
                            <h4 class="text-white">PT. Mitra Sinerji Teknoindo</h4>
                        </a>
                    </a>
                </div>
                <div class="header-button2">
                    <div class="header-button-item js-item-menu">
                        <i class="zmdi zmdi-search"></i>
                        <div class="search-dropdown js-dropdown">
                            <form action="">
                                <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                <span class="search-dropdown__icon">
                                    <i class="zmdi zmdi-search"></i>
                                </span>
                            </form>
                        </div>
                    </div>
                    <div class="header-button-item has-noti js-item-menu">
                        <i class="zmdi zmdi-notifications"></i>
                        <div class="notifi-dropdown js-dropdown">
                            <div class="notifi__title text-center">
                                <p>Anda Tidak Memiliki Pemberitahuan</p>
                            </div>
                            <div class="notifi__footer">
                                <a href="#">All notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-button-item mr-0 js-sidebar-btn">
                        <i class="zmdi zmdi-menu"></i>
                    </div>
                    <div class="setting-menu js-right-sidebar d-none d-lg-block">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="/logout">
                                    <i class="zmdi zmdi-power"></i>Sign Out</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
    <div class="logo text-center ">
        <a href="/admin">
            <h3 class="text-white">PT. Mitra Sinerji Teknoindo</h3>
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                @php
                $a =  auth()->user()->foto;
            @endphp
            <img src="{{ asset("plugin/images/$a") }}" alt="{{ auth()->user()->nama }}" />
            </div>
            <h4 class="name text-center">{{ auth()->user()->nama }}</h4>
            <h6>{{ auth()->user()->level }}</h6>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="/admin">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="/admin/barang">
                        <i class="fas fa-shopping-basket"></i>
                        Barang
                    </a>
                </li>
                <li>
                    <a href="/admin/customer">
                        <i class="fas fa-user"></i>
                        customer
                    </a>
                </li>
                <li>
                    <a href="/admin/transaksi">
                        <i class="fas fa-chart-bar"></i>
                        Transaksi
                    </a>
                </li>
                <li>
                    <a href="/logout">
                        <i class="zmdi zmdi-power"></i>Sign Out</a>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
@endsection
