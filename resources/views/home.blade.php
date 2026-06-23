<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        /* ========== NAVBAR ========== */
        .navbar {
            background: linear-gradient(135deg, #ff6b9d 0%, #4facfe 100%);
            padding: 15px 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: white !important;
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 10px;
            transition: 0.3s;
        }
        
        .nav-link:hover {
            color: #ffe066 !important;
            transform: translateY(-2px);
        }
        
        /* ========== HERO SECTION ========== */
        .hero {
            background: linear-gradient(135deg, #ff6b9d 0%, #4facfe 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-top: 70px;
            border-radius: 0 0 50px 50px;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(255,255,255,0.1)" fill-opacity="0.3" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') repeat-x bottom;
            background-size: cover;
            opacity: 0.3;
        }
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            animation: fadeInUp 0.8s ease 0.2s both;
        }
        
        .btn-hero {
            background: white;
            color: #ff6b9d;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
            animation: fadeInUp 0.8s ease 0.4s both;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        
        .btn-hero:hover {
            transform: scale(1.05);
            background: #ffe066;
            color: #333;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* ========== FEATURE CARD ========== */
        .section-title {
            text-align: center;
            margin: 60px 0 40px;
        }
        
        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 10px;
        }
        
        .section-title p {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .feature-card {
            text-align: center;
            padding: 35px 25px;
            background: white;
            border-radius: 20px;
            height: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            text-decoration: none;
            display: block;
            border-bottom: 4px solid #ff6b9d;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-bottom-color: #4facfe;
        }
        
        .feature-card i {
            font-size: 3rem;
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }
        
        .feature-card h5 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }
        
        .feature-card p {
            color: #666;
            margin-bottom: 15px;
            font-size: 0.85rem;
        }
        
        .feature-card small {
            color: #ff6b9d;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        /* ========== STATS SECTION ========== */
        .stats-section {
            background: white;
            padding: 50px 0;
            margin: 40px 0;
            border-radius: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .stat-label {
            color: #6c757d;
            font-size: 0.85rem;
            margin-top: 5px;
        }
        
        /* ========== PRODUCTS PREVIEW ========== */
        .products-section {
            padding: 20px 0 60px;
        }
        
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: 0.3s;
            height: 100%;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        
        .product-img {
            height: 220px;
            width: 100%;
            object-fit: cover;
        }
        
        .product-body {
            padding: 20px;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #333;
        }
        
        .product-price {
            color: #ff6b9d;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 12px;
        }
        
        .btn-order {
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 25px;
            width: 100%;
            transition: 0.3s;
            font-weight: 500;
        }
        
        .btn-order:hover {
            transform: scale(1.02);
            opacity: 0.9;
        }
        
        /* ========== FOOTER ========== */
        .footer {
            background: linear-gradient(135deg, #2d1b4e, #1a0f2e);
            color: #cbd5e0;
            padding: 50px 0 30px;
            margin-top: 50px;
        }
        
        .footer h5 {
            color: white;
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .footer a {
            color: #cbd5e0;
            text-decoration: none;
            transition: 0.3s;
        }
        
        .footer a:hover {
            color: #ffd700;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 0.9rem;
            }
            
            .section-title h2 {
                font-size: 1.5rem;
            }
            
            .stat-number {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="fas fa-gift me-2"></i> ParselKu
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/produk') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/pesan') }}">Pesan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/lacak') }}">Lacak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/kontak') }}">Kontak</a>
                </li>
                <li class="nav-item" id="authNav"></li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<div class="hero">
    <div class="container">
        <h1>Selamat Datang di ParselKu</h1>
        <p>Kirim kebahagiaan dengan parsel spesial untuk orang tersayang</p>
        <a href="{{ url('/pesan') }}" class="btn-hero">
            <i class="fas fa-shopping-cart me-2"></i> Pesan Sekarang
        </a>
    </div>
</div>

<!-- FEATURE CARDS -->
<div class="container">
    <div class="section-title">
        <h2>Layanan Unggulan Kami</h2>
        <p>Nikmati kemudahan berbelanja parsel di ParselKu</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <a href="{{ url('/produk') }}" class="feature-card">
                <i class="fas fa-eye"></i>
                <h5>Stok Real-time</h5>
                <p>Stok terlihat jelas secara real-time, tidak perlu tanya-tanya</p>
                <small>Klik untuk lihat produk →</small>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="{{ url('/pesan') }}" class="feature-card">
                <i class="fas fa-envelope"></i>
                <h5>Kartu Ucapan</h5>
                <p>Sertakan pesan spesial untuk penerima parsel</p>
                <small>Klik untuk pesan →</small>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="{{ url('/lacak') }}" class="feature-card">
                <i class="fas fa-truck"></i>
                <h5>Lacak Pengiriman</h5>
                <p>Pantau status pesanan Anda kapan saja</p>
                <small>Klik untuk lacak →</small>
            </a>
        </div>
    </div>
</div>

<!-- STATISTICS SECTION -->
<div class="container">
    <div class="stats-section">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number" id="statProducts">0</div>
                    <div class="stat-label">Produk Tersedia</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number" id="statOrders">0</div>
                    <div class="stat-label">Pesanan Sukses</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number" id="statCustomers">0</div>
                    <div class="stat-label">Pelanggan Puas</div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-item">
                    <div class="stat-number" id="statRating">0</div>
                    <div class="stat-label">Rating Pelanggan</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PRODUCTS PREVIEW -->
<div class="container products-section">
    <div class="section-title">
        <h2>Produk Unggulan</h2>
        <p>Pilihan terbaik untuk momen spesial Anda</p>
    </div>
    <div class="row g-4" id="productsContainer"></div>
    <div class="text-center mt-4">
        <a href="{{ url('/produk') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
            Lihat Semua Produk <i class="fas fa-arrow-right ms-2"></i>
        </a>
    </div>
</div>

<!-- FOOTER -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5><i class="fas fa-gift me-2"></i> ParselKu</h5>
                <p>Solusi kirim parsel mudah, cepat, dan berkesan.</p>
                <p><i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Tautan Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ url('/produk') }}">Produk</a></li>
                    <li><a href="{{ url('/pesan') }}">Pesan</a></li>
                    <li><a href="{{ url('/lacak') }}">Lacak</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5>Kontak Kami</h5>
                <p><i class="fas fa-phone me-2"></i> +62 812 3456 7890</p>
                <p><i class="fas fa-envelope me-2"></i> cs@parselku.com</p>
                <p><i class="fab fa-whatsapp me-2"></i> +62 812 3456 7890</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="mb-0">&copy; 2025 ParselKu. Kirim kebahagiaan dengan mudah.</p>
        </div>
    </div>
</div>

<script>
// Data produk awal
const defaultImage = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%23ff6b9d" stroke-width="2"%3E%3Crect x="3" y="3" width="18" height="18" rx="2"%3E%3C/rect%3E%3Ccircle cx="8.5" cy="8.5" r="1.5"%3E%3C/circle%3E%3Cpolyline points="21 15 16 10 5 21"%3E%3C/polyline%3E%3C/svg%3E';

function getProducts() {
    if (!localStorage.getItem('products')) {
        const products = [
            { id: 1, name: 'Parsel Lebaran Premium', price: 350000, stock: 10, image: defaultImage },
            { id: 2, name: 'Parsel Ultah Spesial', price: 225000, stock: 8, image: defaultImage },
            { id: 3, name: 'Parsel Sehat', price: 250000, stock: 5, image: defaultImage },
            { id: 4, name: 'Parsel Valentine', price: 300000, stock: 3, image: defaultImage },
            { id: 5, name: 'Parsel Pernikahan', price: 400000, stock: 4, image: defaultImage },
            { id: 6, name: 'Parsel Baby Gift', price: 275000, stock: 6, image: defaultImage }
        ];
        localStorage.setItem('products', JSON.stringify(products));
    }
    return JSON.parse(localStorage.getItem('products'));
}

function getOrders() {
    return JSON.parse(localStorage.getItem('orders')) || [];
}

function updateStats() {
    const products = getProducts();
    const orders = getOrders();
    const deliveredOrders = orders.filter(o => o.status === 'delivered');
    
    // Hitung statistik
    const totalProducts = products.length;
    const totalOrders = deliveredOrders.length;
    const uniqueCustomers = [...new Set(orders.map(o => o.customer_email))].filter(e => e && e !== '-').length;
    
    // Hitung rata-rata rating
    let totalRating = 0;
    let ratingCount = 0;
    orders.forEach(order => {
        if (order.rating) {
            totalRating += order.rating;
            ratingCount++;
        }
    });
    const avgRating = ratingCount > 0 ? (totalRating / ratingCount).toFixed(1) : 0;
    
    document.getElementById('statProducts').innerText = totalProducts;
    document.getElementById('statOrders').innerText = totalOrders;
    document.getElementById('statCustomers').innerText = uniqueCustomers || totalOrders;
    document.getElementById('statRating').innerHTML = avgRating > 0 ? avgRating + ' ★' : '0 ★';
}

function loadProducts() {
    const products = getProducts();
    let html = '';
    
    // Ambil 3 produk pertama untuk ditampilkan di homepage
    const topProducts = products.slice(0, 3);
    
    for (let product of topProducts) {
        const imageSrc = (product.image && product.image !== defaultImage) ? product.image : defaultImage;
        
        html += `
            <div class="col-md-4">
                <div class="product-card">
                    <img src="${imageSrc}" class="product-img" alt="${product.name}">
                    <div class="product-body">
                        <h5 class="product-title">${product.name}</h5>
                        <div class="product-price">Rp ${product.price.toLocaleString('id-ID')}</div>
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

// Load semua data
loadProducts();
updateStats();
updateNavbar();

// Refresh statistik setiap 5 detik (real-time)
setInterval(() => {
    updateStats();
}, 5000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>