<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-sm border-radius-xl"
     id="navbarBlur"
     navbar-scroll="true">

    <div class="container-fluid py-2 px-3">

        {{-- BREADCRUMB --}}
        <div class="d-flex flex-column">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-6 text-dark" href="#">Admin</a>
                    </li>
                    <li class="breadcrumb-item text-sm text-dark active">
                        Dashboard
                    </li>
                </ol>
            </nav>
            <h6 class="font-weight-bolder mb-0">
                Dashboard
            </h6>
        </div>

        {{-- RIGHT SIDE --}}
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav align-items-center">

                {{-- USER INFO --}}
                <li class="nav-item d-flex align-items-center me-3">
                    <div class="d-flex align-items-center bg-gray-100 px-3 py-2 rounded-3">
                        <img
                            src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=5e72e4&color=fff"
                            class="avatar avatar-sm me-2"
                            alt="avatar">

                        <div class="d-flex flex-column lh-sm">
                            <span class="text-sm font-weight-bold text-dark">
                                {{ auth()->user()->name }}
                            </span>
                            <span class="text-xs text-secondary">
                                {{ strtoupper(auth()->user()->role) }}
                            </span>
                        </div>
                    </div>
                </li>

                {{-- DROPDOWN --}}
                <li class="nav-item dropdown">
                    <a href="#"
                       class="nav-link text-dark p-0"
                       id="dropdownUser"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="material-icons cursor-pointer">
                            Account
                        </i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 shadow"
                        aria-labelledby="dropdownUser"
                        style="min-width: 180px;">

                        {{-- PROFILE --}}
                        <li>
                            <a class="dropdown-item border-radius-md d-flex align-items-center"
                               href="{{ route('profile.edit') }}">
                                Profil Saya
                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        {{-- LOGOUT --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="dropdown-item border-radius-md d-flex align-items-center text-danger">
                                    Logout
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
