<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl">
    <div class="container-fluid py-1 px-3">
        <span class="navbar-brand">Admin Dashboard</span>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-sm btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
