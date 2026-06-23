<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: linear-gradient(135deg, #ffe4ec 0%, #e0f7fa 100%); }
        .navbar { background: linear-gradient(135deg, #ff6b9d 0%, #4facfe 100%); padding: 15px 0; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 600; }
        .nav-link:hover { color: #ffe066 !important; }
        .product-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: 0.3s; height: 100%; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
        .product-img { height: 220px; width: 100%; object-fit: cover; }
        .product-body { padding: 20px; }
        .product-price { color: #ff6b9d; font-size: 22px; font-weight: bold; }
        .stock-info { font-size: 13px; margin: 10px 0; padding: 8px; border-radius: 10px; }
        .stock-available { background: #d4edda; color: #155724; }
        .stock-low { background: #fff3cd; color: #856404; }
        .stock-empty { background: #f8d7da; color: #721c24; }
        .btn-order { background: linear-gradient(135deg, #ff6b9d, #4facfe); color: white; border: none; padding: 10px 20px; border-radius: 25px; width: 100%; transition: 0.3s; }
        .btn-order:hover { opacity: 0.9; transform: scale(1.02); }
        .footer { background: linear-gradient(135deg, #ff6b9d 0%, #4facfe 100%); color: white; padding: 40px 0 20px; margin-top: 50px; text-align: center; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><i class="fas fa-gift me-2"></i> ParselKu</a>
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

<div class="container mt-5 pt-5">
    <h2 class="text-center mb-4" style="color: #ff6b9d;">🌸 Produk Parsel Kami 🌊</h2>
    <p class="text-center text-muted mb-5">Stok akan berubah secara REAL-TIME saat ada pemesanan</p>
    
    <div class="row g-4" id="productsContainer"></div>
</div>

<div class="footer">
    <div class="container">
        <p><i class="fas fa-heart text-warning"></i> &copy; 2025 ParselKu. Kirim kebahagiaan dengan mudah. <i class="fas fa-heart text-warning"></i></p>
    </div>
</div>

<script>
const defaultImage = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%23ff6b9d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"%3E%3Crect x="3" y="3" width="18" height="18" rx="2" ry="2"%3E%3C/rect%3E%3Ccircle cx="8.5" cy="8.5" r="1.5"%3E%3C/circle%3E%3Cpolyline points="21 15 16 10 5 21"%3E%3C/polyline%3E%3C/svg%3E';

function getProducts() {
    if (!localStorage.getItem('products')) {
        const initialProducts = [
            { id: 1, name: 'Parsel Lebaran Premium', price: 350000, stock: 10, image: defaultImage },
            { id: 2, name: 'Parsel Ultah Spesial', price: 225000, stock: 8, image: defaultImage },
            { id: 3, name: 'Parsel Sehat', price: 250000, stock: 5, image: defaultImage },
            { id: 4, name: 'Parsel Valentine', price: 300000, stock: 3, image: defaultImage },
            { id: 5, name: 'Parsel Pernikahan', price: 400000, stock: 4, image: defaultImage },
            { id: 6, name: 'Parsel Baby Gift', price: 275000, stock: 6, image: defaultImage }
        ];
        localStorage.setItem('products', JSON.stringify(initialProducts));
    }
    return JSON.parse(localStorage.getItem('products'));
}

function loadProducts() {
    const products = getProducts();
    let html = '';
    
    for (let i = 0; i < products.length; i++) {
        const product = products[i];
        let stockClass = '';
        let stockText = '';
        if (product.stock <= 0) {
            stockClass = 'stock-empty';
            stockText = '❌ HABIS!';
        } else if (product.stock <= 3) {
            stockClass = 'stock-low';
            stockText = '⚠️ Stok Terbatas!';
        } else {
            stockClass = 'stock-available';
            stockText = '✅ Tersedia';
        }
        
        const imageSrc = (product.image && product.image !== defaultImage) ? product.image : defaultImage;
        
        html += `
            <div class="col-md-4">
                <div class="product-card">
                    <img src="${imageSrc}" class="product-img" alt="${product.name}" onerror="this.src='${defaultImage}'">
                    <div class="product-body">
                        <h5 class="product-title">${product.name}</h5>
                        <p class="text-muted small">Paket spesial untuk momen istimewa</p>
                        <div class="product-price">Rp ${product.price.toLocaleString('id-ID')}</div>
                        <div class="stock-info ${stockClass}"><i class="fas fa-boxes me-1"></i> Stok: ${product.stock} ${stockText}</div>
                        <button class="btn-order" onclick="location.href='{{ url('/pesan') }}?product=${product.id}'">
                            <i class="fas fa-shopping-cart me-2"></i> Pesan
                        </button>
                    </div>
                </div>
            </div>
        `;
    }
    
    document.getElementById('productsContainer').innerHTML = html;
}

function updateNavbar() {
    const currentUser = localStorage.getItem('currentUser');
    const authNav = document.getElementById('authNav');
    
    if (currentUser) {
        const user = JSON.parse(currentUser);
        if (user.role === 'admin') {
            authNav.innerHTML = `<div class="dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fas fa-user-cog"></i> ${user.name}</a><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="{{ url('/admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a></li></ul></div>`;
        } else {
            authNav.innerHTML = `<div class="dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fas fa-user-circle"></i> ${user.name}</a><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="{{ url('/user/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard User</a></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Logout</a></li></ul></div>`;
        }
    } else {
        authNav.innerHTML = `<a class="nav-link" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt me-1"></i> Login</a><a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-plus me-1"></i> Daftar</a>`;
    }
}

function logout() {
    localStorage.removeItem('currentUser');
    window.location.href = '{{ url("/") }}';
}

// Initial load
loadProducts();
updateNavbar();

// Auto refresh stok setiap 2 detik (real-time)
setInterval(function() { 
    loadProducts(); 
}, 2000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>