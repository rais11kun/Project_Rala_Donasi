<style>
    .navbar-header { background: #ffffff !important; border-bottom: 1px solid #f1f1f1; height: 60px; }
    .profile-pill {
        background: #f8fbfd; padding: 5px 15px; border-radius: 50px;
        border: 1px solid #e1e8ed; display: flex; align-items: center; margin-top: 8px;
    }
    .img-circle-nav { width: 32px; height: 32px; object-fit: cover; border: 2px solid #2cabe3; border-radius: 50%; }

    /* Pastikan dropdown selalu di atas elemen lain */
.navbar-top-links .dropdown-menu {
    z-index: 1050 !important;
    display: none;
}

/* Munculkan menu saat class 'open' atau 'show' aktif */
.dropdown.open .dropdown-menu, .dropdown.show .dropdown-menu {
    display: block !important;
}
</style>

<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <a class="logo" href="{{ url('/staff/dashboard') }}">
                <span class="hidden-xs">
                    <b style="color: #2cabe3; font-weight: 800; font-size: 20px; padding-left: 20px;">GIVEHOPE</b>
                </span>
            </a>
        </div>

        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" data-bs-toggle="dropdown" href="#">
                    <div class="profile-pill">
                        <img src="{{ Auth::user()->profile_photo ? asset('uploads/profile/'.Auth::user()->profile_photo) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&background=2cabe3&color=fff' }}" 
                             class="img-circle-nav">
                        <b class="hidden-xs" style="color: #2d3436; margin-left: 10px; font-weight: 700;">
                            {{ Auth::user()->name }}
                        </b>
                        <i class="fa fa-angle-down m-l-5 text-muted"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated flipInY" style="width: 200px; border: none; box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-radius: 12px;">
                    <li><div class="dw-user-box" style="padding: 15px; text-align: center;">
                        <p class="text-muted" style="font-size: 11px; font-weight: 800;">ROLE: {{ strtoupper(Auth::user()->role) }}</p>
                    </div></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('staff.profile') }}" style="padding: 10px 20px; display: block;"><i class="fa fa-user m-r-10 text-info"></i> Profil Saya</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger" style="padding: 10px 20px; display: block; font-weight: 700;">
                            <i class="fa fa-power-off m-r-10"></i> Keluar
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>