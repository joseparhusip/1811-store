<header>
    <div class="top-bar">
        <div class="container">
            <p class="top-bar-text">GOOD CLOTHES MADE FROM GOOD HAND</p>
            <div class="top-bar-links">
                <a href="#">Help & FAQs</a>
                @auth
                    <a href="{{ route('profile') }}">My Account</a>
                @else
                    <a href="{{ route('login') }}">My Account</a>
                @endauth
                <span>EN</span>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="container">
            {{-- [PERUBAHAN] Mengganti ikon dan teks dengan logo gambar --}}
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('assets/img/logo-1811-store.png') }}" alt="1811 Store Logo">
            </a>

            <ul class="navbar-nav">
                <li class="mobile-menu-header">
                    {{-- [PERUBAHAN] Mengganti ikon dan teks dengan logo gambar untuk menu mobile --}}
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="{{ asset('assets/img/logo-1811-store.png') }}" alt="1811 Store Logo">
                    </a>
                    <button id="close-menu" class="close-menu">
                        <i class='bx bx-x'></i>
                    </button>
                </li>

                <li><a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('shop') }}" class="nav-link {{ request()->is('shop') ? 'active' : '' }}">Shop</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>

                <li class="mobile-menu-icons">
                    @guest
                        <a href="{{ route('login') }}"><i class='bx bx-user'></i> Profile</a>
                    @endguest
                    
                    @auth
                        <a href="{{ route('profile') }}"><i class='bx bx-user'></i> Profile</a>
                        <form method="POST" action="{{ route('logout') }}" style="display: contents;">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class='bx bx-log-out'></i> Logout
                            </a>
                        </form>
                    @endauth
                    <a href="{{ route('cart.index') }}"><i class='bx bx-cart'></i> Keranjang</a>
                </li>
            </ul>

            <div class="navbar-icons-desktop">
                @guest
                    <a href="{{ route('login') }}" title="Login/Register"><i class='bx bx-user'></i></a>
                @endguest
                
                @auth
                    <a href="{{ route('profile') }}" title="My Profile"><i class='bx bxs-user-circle'></i></a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" title="Logout">
                            <i class='bx bx-log-out'></i>
                        </a>
                    </form>
                @endauth
                
                <a href="{{ route('cart.index') }}"><i class='bx bx-cart'></i></a>
            </div>
            
            <button class="menu-toggle" id="menu-toggle">
                <i class='bx bx-menu'></i>
            </button>
        </div>
    </nav>
</header>