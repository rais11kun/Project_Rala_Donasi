@push('styles')
<style>
    /* Reset Sidebar Dasar */
    .navbar-default.sidebar {
        background: #ffffff !important;
        box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        border: none;
        width: 240px;
        position: fixed;
        height: 100%;
        z-index: 10;
    }

    /* Header Sidebar (Logo/Nama Aplikasi) */
    .sidebar-head {
        padding: 25px 20px;
        background: #ffffff;
        text-align: center;
        border-bottom: 1px solid #f1f1f1;
    }
    
    .sidebar-head h3 {
        color: #2b3d51 !important;
        font-weight: 800 !important;
        letter-spacing: 1px;
        margin: 0;
        font-size: 18px;
    }

    /* Styling Menu List */
    .sidebar-nav {
        margin-top: 10px;
    }

    #side-menu li a {
        padding: 12px 20px;
        font-size: 14px;
        color: #6c757d;
        font-weight: 500;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
        border-radius: 0 50px 50px 0; /* Membuat ujung kanan melengkung */
        margin-right: 15px;
        margin-bottom: 5px;
    }

    #side-menu li a i {
        font-size: 18px;
        margin-right: 15px;
        width: 25px;
        text-align: center;
        transition: all 0.3s ease;
    }

    /* State Active (Menu yang terpilih) */
    #side-menu li a.active {
        background: #f0f7ff !important;
        color: #2cabe3 !important;
        font-weight: 700;
        border-left: 4px solid #2cabe3;
    }

    #side-menu li a.active i {
        color: #2cabe3 !important;
    }

    /* Hover Effect */
    #side-menu li a:hover:not(.active) {
        background: #f8f9fa;
        color: #2b3d51;
        padding-left: 25px; /* Efek geser sedikit saat hover */
    }

    /* Tombol Keluar (Danger Area) */
    .logout-item {
        margin-top: 30px;
        border-top: 1px solid #f1f1f1;
        padding-top: 15px;
    }

    .logout-link {
        color: #fb3a3a !important;
    }

    .logout-link:hover {
        background: #fff5f5 !important;
    }
</style>
@endpush

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3>
                <span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> 
                <span class="hide-menu" style="font-weight: 800; letter-spacing: 2px;">GIVEHOPE</span>
            </h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href="{{ url('/staff/dashboard') }}" class="waves-effect {{ Request::is('staff/dashboard') ? 'active' : '' }}">
                    <i class="fa fa-th-large fa-fw"></i> <span class="hide-menu" style="font-size: 16px; font-weight: 600;">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staff.donations.index') }}" class="waves-effect {{ Request::is('staff/donations*') ? 'active' : '' }}">
                    <i class="fa fa-tag fa-fw"></i> <span class="hide-menu" style="font-size: 15px;">Donasi Kategori</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staff.incoming.index') }}" class="waves-effect {{ Request::is('staff/incoming*') ? 'active' : '' }}">
                    <i class="fa fa-check-square-o fa-fw text-success"></i> <span class="hide-menu" style="font-size: 15px;">Verifikasi Donasi</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staff.volunteers.index') }}" class="waves-effect {{ Request::is('staff/volunteers*') ? 'active' : '' }}">
                    <i class="fa fa-users fa-fw"></i> <span class="hide-menu" style="font-size: 15px;">Daftar Relawan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staff.contacts.index') }}" class="waves-effect {{ Request::is('staff/contacts*') ? 'active' : '' }}">
                    <i class="fa fa-envelope-o fa-fw"></i> <span class="hide-menu" style="font-size: 15px;">Pesan Masuk</span>
                </a>
            </li>

            <li class="logout-item" style="border-top: 1px solid #eee; margin-top: 20px;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="waves-effect text-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-power   -off fa-fw"></i> <span class="hide-menu" style="font-weight: 700;">KELUAR</span>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>