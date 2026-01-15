<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 shadow-sm">
    <div class="container-fluid">
        <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold m-0" style="color: #fbb034;">GIVE<span style="color: #126d61;">HOPE</span></h1>
        </a>

        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link fw-bold active" style="color: #fbb034 !important;">Home</a>
                <a href="{{ url('/') }}#about" class="nav-item nav-link fw-bold text-dark">About</a>
                <a href="{{ url('/') }}#donasi" class="nav-item nav-link fw-bold text-dark">Donasi</a>
                <a href="#event" class="nav-item nav-link fw-bold text-dark">Event</a>
                <a href="{{ url('/') }}#contact" class="nav-item nav-link fw-bold text-dark">Contact</a>
            </div>

            <div class="d-none d-lg-flex ms-2">
                {{-- TAMPILKAN JIKA BELUM LOGIN (GUEST) --}}
                @guest
                    <a class="btn py-2 px-4 fw-bold" href="{{ route('login') }}" 
                       style="border: 2px solid #126d61; color: #126d61; border-radius: 10px; transition: 0.3s;">
                       Masuk
                    </a>
                @endguest

                {{-- TAMPILKAN JIKA SUDAH LOGIN (AUTH) --}}
                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="btn py-2 px-4 fw-bold dropdown-toggle" data-bs-toggle="dropdown"
                           style="border: 2px solid #126d61; color: #126d61; border-radius: 10px;">
                           <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end m-0 shadow-sm border-0">
                            {{-- Gunakan Form untuk Logout demi keamanan CSRF --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger fw-bold">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    /* Efek Hover untuk Menu */
    .navbar-light .navbar-nav .nav-link {
        position: relative;
        padding: 25px 15px;
        transition: 0.3s;
    }
    
    .navbar-light .navbar-nav .nav-link:hover {
        color: #fbb034 !important;
    }

    .navbar-light .navbar-nav .nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 20px;
        left: 50%;
        background: #fbb034;
        transition: 0.3s;
        transform: translateX(-50%);
    }

    .navbar-light .navbar-nav .nav-link:hover::after {
        width: 60%;
    }

    /* Hover Tombol Masuk/Logout */
    .navbarCollapse .btn:hover {
        background-color: #126d61 !important;
        color: white !important;
    }

    /* Merapikan posisi dropdown */
    .dropdown-menu {
        border-radius: 10px;
        margin-top: 10px !important;
    }
</style>