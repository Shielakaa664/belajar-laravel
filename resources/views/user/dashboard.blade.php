<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; }
        
        /* Navbar */
        .navbar { background: linear-gradient(135deg, #ff6b9d, #4facfe); padding: 12px 0; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 500; }
        
        /* Sidebar User */
        .sidebar {
            background: linear-gradient(180deg, #2d1b4e 0%, #1a0f2e 100%);
            min-height: calc(100vh - 70px);
            position: sticky;
            top: 70px;
        }
        .sidebar .nav-link {
            color: #e0d4ff;
            padding: 12px 20px;
            border-radius: 12px;
            margin: 5px 15px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: linear-gradient(90deg, #ff6b9d, #4facfe);
            color: white;
        }
        .sidebar .nav-link i { width: 28px; margin-right: 12px; }
        
        /* Rating Stars */
        .rating-stars {
            display: inline-flex;
            gap: 5px;
            cursor: pointer;
        }
        .rating-stars i {
            font-size: 1.2rem;
            color: #ddd;
            transition: all 0.2s;
        }
        .rating-stars i.active, .rating-stars i:hover {
            color: #ffc107;
        }
        .rating-stars i:hover ~ i {
            color: #ddd;
        }
        
        /* Order Card */
        .order-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        .order-card:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 500;
        }
        .status-pending { background: #ffeaa7; color: #d63031; }
        .status-processing { background: #81ecec; color: #0984e3; }
        .status-shipped { background: #74b9ff; color: #2d3436; }
        .status-delivered { background: #55efc4; color: #006266; }
        
        .btn-rating {
            background: linear-gradient(135deg, #ffc107, #fd7e14);
            border: none;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.75rem;
            color: white;
        }
        .rating-display {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 8px 12px;
            margin-top: 10px;
        }
        
        .content { padding: 20px; }
        .page-title { margin-bottom: 25px; }
        .page-title h2 { font-weight: 600; color: #333; }
        
        @media (max-width: 768px) {
            .sidebar { min-height: auto; position: relative; top: 0; }
        }
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

<div class="container-fluid mt-5 pt-4">
    <div class="row">
        <!-- Sidebar User -->
        <div class="col-md-3 col-lg-2">
            <div class="sidebar p-3">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#" onclick="goTo('user.dashboard')">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a class="nav-link" href="#" onclick="goTo('user.orders')">
                        <i class="fas fa-shopping-cart"></i> Pesanan Saya
                    </a>
                    <a class="nav-link" href="#" onclick="goTo('order')">
                        <i class="fas fa-plus-circle"></i> Pesan Baru
                    </a>
                    <a class="nav-link" href="#" onclick="goTo('tracking')">
                        <i class="fas fa-search"></i> Lacak Pesanan
                    </a>
                    <hr>
                    <a class="nav-link" href="#" onclick="logout()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="col-md-9 col-lg-10">
            <div class="content">
                <div class="page-title">
                    <h2><i class="fas fa-smile me-2" style="color: #ff6b9d;"></i> Dashboard Saya</h2>
                    <p>Lihat pesanan dan beri rating untuk produk yang sudah diterima</p>
                </div>
                
                <div id="ordersContainer"></div>
            </div>
        </div>
    </div>
</div>

<script>
// Data awal produk
const defaultImage = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%23ff6b9d" stroke-width="2"%3E%3Crect x="3" y="3" width="18" height="18" rx="2"%3E%3C/rect%3E%3Ccircle cx="8.5" cy="8.5" r="1.5"%3E%3C/circle%3E%3Cpolyline points="21 15 16 10 5 21"%3E%3C/polyline%3E%3C/svg%3E';

const initialProducts = [
    { id: 1, name: 'Parsel Lebaran Premium', price: 350000, stock: 10, image: defaultImage },
    { id: 2, name: 'Parsel Ultah Spesial', price: 225000, stock: 8, image: defaultImage },
    { id: 3, name: 'Parsel Sehat', price: 250000, stock: 5, image: defaultImage },
    { id: 4, name: 'Parsel Valentine', price: 300000, stock: 3, image: defaultImage },
    { id: 5, name: 'Parsel Pernikahan', price: 400000, stock: 4, image: defaultImage },
    { id: 6, name: 'Parsel Baby Gift', price: 275000, stock: 6, image: defaultImage }
];

function getProducts() {
    if (!localStorage.getItem('products')) {
        localStorage.setItem('products', JSON.stringify(initialProducts));
    }
    return JSON.parse(localStorage.getItem('products'));
}

function getOrders() {
    return JSON.parse(localStorage.getItem('orders')) || [];
}

function saveOrders(orders) {
    localStorage.setItem('orders', JSON.stringify(orders));
}

function getCurrentUser() {
    return JSON.parse(localStorage.getItem('currentUser'));
}

function getUserOrders() {
    const user = getCurrentUser();
    if (!user) return [];
    const allOrders = getOrders();
    return allOrders.filter(order => order.customer_email === user.email);
}

function saveRating(orderNumber, productId, rating) {
    let orders = getOrders();
    const orderIndex = orders.findIndex(o => o.order_number === orderNumber);
    if (orderIndex !== -1) {
        orders[orderIndex].rating = rating;
        orders[orderIndex].rated_at = new Date().toISOString();
        saveOrders(orders);
        
        // Update juga di produk (rata-rata rating)
        updateProductRating(productId);
        
        alert('⭐ Terima kasih atas rating Anda!');
        loadUserOrders();
    }
}

function updateProductRating(productId) {
    let orders = getOrders();
    let productOrders = orders.filter(o => {
        let product = getProducts().find(p => p.name === o.product_name);
        return product && product.id === productId && o.rating;
    });
    
    if (productOrders.length > 0) {
        let avgRating = productOrders.reduce((sum, o) => sum + o.rating, 0) / productOrders.length;
        let products = getProducts();
        let productIndex = products.findIndex(p => p.id === productId);
        if (productIndex !== -1) {
            products[productIndex].avg_rating = Math.round(avgRating * 10) / 10;
            localStorage.setItem('products', JSON.stringify(products));
        }
    }
}

function renderRatingStars(orderNumber, productId, currentRating, isDelivered) {
    if (!isDelivered) {
        return '<div class="text-muted small"><i class="fas fa-clock me-1"></i> Rating tersedia setelah pesanan selesai</div>';
    }
    
    if (currentRating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += `<i class="fas fa-star" style="color: ${i <= currentRating ? '#ffc107' : '#ddd'}"></i>`;
        }
        return `<div class="rating-display"><strong>Rating Anda:</strong><br>${stars}<br><small class="text-muted">Terima kasih sudah memberi rating!</small></div>`;
    }
    
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        stars += `<i class="far fa-star" data-rating="${i}" style="cursor: pointer; font-size: 1.3rem; margin: 0 2px;" onclick="saveRating('${orderNumber}', ${productId}, ${i})"></i>`;
    }
    return `<div class="rating-display"><strong>⭐ Beri Rating untuk produk ini:</strong><br><div class="rating-stars">${stars}</div><small class="text-muted">Klik bintang untuk memberi rating</small></div>`;
}

function getStatusBadge(status) {
    const badges = {
        'pending': '<span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Menunggu</span>',
        'processing': '<span class="status-badge status-processing"><i class="fas fa-cogs me-1"></i> Diproses</span>',
        'shipped': '<span class="status-badge status-shipped"><i class="fas fa-truck me-1"></i> Dikirim</span>',
        'delivered': '<span class="status-badge status-delivered"><i class="fas fa-check-circle me-1"></i> Selesai</span>'
    };
    return badges[status] || badges['pending'];
}

function loadUserOrders() {
    const orders = getUserOrders();
    const products = getProducts();
    
    if (orders.length === 0) {
        document.getElementById('ordersContainer').innerHTML = `
            <div class="alert alert-info text-center">
                <i class="fas fa-shopping-cart fa-2x mb-2 d-block"></i>
                <h5>Belum ada pesanan</h5>
                <p>Yuk pesan parsel sekarang!</p>
                <a href="{{ url('/pesan') }}" class="btn btn-primary">Pesan Sekarang</a>
            </div>
        `;
        return;
    }
    
    let html = '';
    for (let order of orders.reverse()) {
        const product = products.find(p => order.product_name.includes(p.name));
        const productId = product ? product.id : 1;
        const isDelivered = order.status === 'delivered';
        
        html += `
            <div class="order-card">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="mb-0">${order.product_name}</h5>
                            ${getStatusBadge(order.status)}
                        </div>
                        <p class="text-muted small mb-1">
                            <i class="fas fa-hashtag"></i> ${order.order_number}<br>
                            <i class="fas fa-calendar"></i> ${new Date(order.order_date).toLocaleDateString('id-ID')}<br>
                            <i class="fas fa-box"></i> ${order.quantity} pcs
                        </p>
                        <p class="mb-1"><strong>Total:</strong> Rp ${order.total_price.toLocaleString('id-ID')}</p>
                        <p class="text-muted small"><i class="fas fa-map-marker-alt"></i> ${order.address.substring(0, 50)}...</p>
                    </div>
                    <div class="col-md-4">
                        ${renderRatingStars(order.order_number, productId, order.rating, isDelivered)}
                        <div class="mt-2">
                            <button class="btn btn-sm btn-outline-primary" onclick="showOrderDetail('${order.order_number}')">
                                <i class="fas fa-eye"></i> Detail Pesanan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    
    document.getElementById('ordersContainer').innerHTML = html;
}

function showOrderDetail(orderNumber) {
    const orders = getOrders();
    const order = orders.find(o => o.order_number === orderNumber);
    if (order) {
        let statusText = '';
        switch(order.status) {
            case 'pending': statusText = 'Menunggu Konfirmasi'; break;
            case 'processing': statusText = 'Sedang Diproses'; break;
            case 'shipped': statusText = 'Dalam Pengiriman'; break;
            case 'delivered': statusText = 'Pesanan Selesai'; break;
        }
        
        alert(`📦 DETAIL PESANAN\n\nNo Pesanan: ${order.order_number}\nNama: ${order.customer_name}\nProduk: ${order.product_name}\nJumlah: ${order.quantity} pcs\nTotal: Rp ${order.total_price.toLocaleString('id-ID')}\nAlamat: ${order.address}\nTanggal Kirim: ${new Date(order.delivery_date).toLocaleDateString('id-ID')}\nStatus: ${statusText}\nKartu Ucapan: "${order.greeting_card}"`);
    }
}

function updateNavbar() {
    const currentUser = localStorage.getItem('currentUser');
    const authNav = document.getElementById('authNav');
    
    if (currentUser) {
        const user = JSON.parse(currentUser);
        if (user.role === 'admin') {
            authNav.innerHTML = `<div class="dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-user-cog"></i> ${user.name}</a><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="{{ url('/admin/dashboard') }}">Dashboard Admin</a></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item text-danger" href="#" onclick="logout()">Logout</a></li></ul></div>`;
        } else {
            authNav.innerHTML = `<div class="dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"><i class="fas fa-user-circle"></i> ${user.name}</a><ul class="dropdown-menu dropdown-menu-end"><li><a class="dropdown-item" href="{{ url('/user/dashboard') }}">Dashboard User</a></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item text-danger" href="#" onclick="logout()">Logout</a></li></ul></div>`;
        }
    } else {
        authNav.innerHTML = `<a class="nav-link" href="{{ url('/login') }}">Login</a><a class="nav-link" href="{{ url('/register') }}">Daftar</a>`;
    }
}

function goTo(route) {
    if (route === 'home') window.location.href = '/';
    else if (route === 'user.dashboard') window.location.href = '/user/dashboard';
    else if (route === 'user.orders') window.location.href = '/user/orders';
    else if (route === 'order') window.location.href = '/pesan';
    else if (route === 'tracking') window.location.href = '/lacak';
}

function logout() {
    localStorage.removeItem('currentUser');
    window.location.href = '/';
}

// Cek login
const currentUser = localStorage.getItem('currentUser');
if (!currentUser) window.location.href = '/login';
else {
    const user = JSON.parse(currentUser);
    if (user.role !== 'user') window.location.href = '/login';
}

updateNavbar();
loadUserOrders();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>