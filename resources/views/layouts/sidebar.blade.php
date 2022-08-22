@section('sidebar')
    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar2">
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
                            <i class="fas fa-users"></i>
                            customer
                        </a>
                    </li>

                    <li>
                        <a href="/admin/transaksi">
                            <i class="fas fa-chart-bar"></i>
                            Transaksi
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
@endsection
