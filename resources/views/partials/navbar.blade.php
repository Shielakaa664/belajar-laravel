<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-gift"></i> ParselKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/produk') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/pesan') }}">Pesan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/lacak') }}">Lacak</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/kontak') }}">Kontak</a></li>
                <li class="nav-item" id="authNav"></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function updateNavbar() {
        const currentUser = localStorage.getItem('currentUser');
        const authNav = document.getElementById('authNav');
        
        if (currentUser) {
            const user = JSON.parse(currentUser);
            if (user.role === 'admin') {
                authNav.innerHTML = `
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-cog"></i> ${user.name}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                `;
            } else {
                authNav.innerHTML = `
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> ${user.name}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/user/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard User</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                `;
            }
        } else {
            authNav.innerHTML = `
                <a class="nav-link" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                <a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-plus me-1"></i> Daftar</a>
            `;
        }
    }
    
    function logout() {
        localStorage.removeItem('currentUser');
        window.location.href = '{{ url("/") }}';
    }
    
    updateNavbar();
</script>