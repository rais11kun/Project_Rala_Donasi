<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3>
                <span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> 
                <span class="hide-menu">GIVEHOPE STAFF</span>
            </h3>
        </div>
        <ul class="nav" id="side-menu">
            <li style="padding: 70px 0 0;">
                <a href="{{ url('/staff/dashboard') }}" class="waves-effect {{ Request::is('staff/dashboard') ? 'active' : '' }}">
                    <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('staff.donations.index') }}" class="waves-effect {{ Request::is('staff/donations*') ? 'active' : '' }}">
                    <i class="fa fa-hand-holding-heart fa-fw" aria-hidden="true"></i>Donasi Kategori
                </a>
            </li>

            <li>
                <a href="{{ route('staff.campaigns.index') }}" class="waves-effect {{ Request::is('staff/campaigns*') ? 'active' : '' }}">
                    <i class="fa fa-bullhorn fa-fw" aria-hidden="true"></i>Saluran & Berita
                </a>
            </li>

            <li>
                <a href="{{ route('staff.events.index') }}" class="waves-effect {{ Request::is('staff/events*') ? 'active' : '' }}">
                    <i class="fa fa-calendar fa-fw" aria-hidden="true"></i>Kelola Event
                </a>
            </li>

            <li>
                <a href="{{ route('staff.volunteers.index') }}" class="waves-effect {{ Request::is('staff/volunteers*') ? 'active' : '' }}">
                    <i class="fa fa-users fa-fw" aria-hidden="true"></i>Daftar Relawan
                </a>
            </li>

            <li>
                <a href="{{ route('staff.contacts.index') }}" class="waves-effect {{ Request::is('staff/contacts*') ? 'active' : '' }}">
                    <i class="fa fa-envelope fa-fw" aria-hidden="true"></i>Data Contact
                </a>
            </li>

            <li class="mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="waves-effect text-danger" 
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa fa-sign-out fa-fw text-danger" aria-hidden="true"></i>Keluar
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>