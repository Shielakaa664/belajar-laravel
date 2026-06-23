<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pesanan - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; }
        
        .navbar { background: linear-gradient(135deg, #ff6b9d 0%, #4facfe 100%); padding: 15px 0; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 600; }
        .nav-link:hover { color: #ffe066 !important; }
        
        .tracking-form {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        
        .btn-track {
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            color: white;
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-track:hover { transform: scale(1.02); opacity: 0.9; }
        
        .result-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: none;
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
        }
        .status-pending { background: #ffeaa7; color: #d63031; }
        .status-processing { background: #81ecec; color: #0984e3; }
        .status-shipped { background: #74b9ff; color: #2d3436; }
        .status-delivered { background: #55efc4; color: #006266; }
        
        .timeline { position: relative; padding-left: 30px; }
        .timeline-item {
            position: relative;
            padding-bottom: 25px;
            border-left: 2px solid #e0e0e0;
            padding-left: 20px;
            margin-left: 10px;
        }
        .timeline-item:last-child { border-left: none; }
        .timeline-icon {
            position: absolute;
            left: -12px;
            top: 0;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            border: 3px solid white;
            box-shadow: 0 0 0 2px #ff6b9d;
        }
        
        .greeting-box {
            background: linear-gradient(135deg, #ffe4ec, #e0f7fa);
            border-radius: 15px;
            padding: 18px;
            margin-top: 15px;
            border-left: 4px solid #ff6b9d;
        }
        
        /* Rating Stars */
        .rating-section {
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
            text-align: center;
        }
        .rating-stars {
            display: inline-flex;
            gap: 8px;
            cursor: pointer;
            margin: 10px 0;
        }
        .rating-stars i {
            font-size: 2rem;
            color: #ddd;
            transition: all 0.2s;
        }
        .rating-stars i.active, .rating-stars i:hover {
            color: #ffc107;
            transform: scale(1.1);
        }
        .rating-stars i:hover ~ i {
            color: #ddd;
        }
        .rating-display {
            background: #e8f5e9;
            border-radius: 12px;
            padding: 12px;
            margin-top: 10px;
        }
        .rating-display i {
            font-size: 1.2rem;
            margin: 0 2px;
        }
        
        .footer {
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            color: white;
            padding: 40px 0 20px;
            margin-top: 50px;
            text-align: center;
        }
        
        .info-card {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 15px;
            height: 100%;
        }
        
        @media (max-width: 768px) {
            .tracking-form { padding: 20px; }
            .rating-stars i { font-size: 1.5rem; }
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

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tracking-form">
                <i class="fas fa-search-location fa-3x" style="color: #ff6b9d;"></i>
                <h2 class="mb-3 mt-2">Lacak Pesanan Anda</h2>
                <p class="text-muted mb-4">Masukkan nomor pesanan yang Anda terima saat memesan</p>
                
                <form id="trackingForm">
                    <div class="mb-3">
                        <input type="text" id="orderNumber" class="form-control form-control-lg" placeholder="Contoh: PSL-20250321-0001" required style="border-radius: 50px; padding: 12px 20px;">
                    </div>
                    <button type="submit" class="btn-track"><i class="fas fa-search me-2"></i> Lacak Pesanan</button>
                </form>
            </div>
            
            <!-- Hasil Pencarian -->
            <div id="resultContainer" class="result-card">
                <div id="resultContent"></div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <p><i class="fas fa-heart text-warning"></i> &copy; 2025 ParselKu. Kirim kebahagiaan dengan mudah. <i class="fas fa-heart text-warning"></i></p>
    </div>
</div>

<script>
// Fungsi untuk mendapatkan status badge
function getStatusBadge(status) {
    const badges = {
        'pending': '<span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Menunggu Konfirmasi</span>',
        'processing': '<span class="status-badge status-processing"><i class="fas fa-cogs me-1"></i> Sedang Diproses</span>',
        'shipped': '<span class="status-badge status-shipped"><i class="fas fa-truck me-1"></i> Dalam Pengiriman</span>',
        'delivered': '<span class="status-badge status-delivered"><i class="fas fa-check-circle me-1"></i> Telah Diterima</span>'
    };
    return badges[status] || badges['pending'];
}

// Format tanggal
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

// Ambil data produk
function getProducts() {
    if (!localStorage.getItem('products')) {
        const defaultImage = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%23ff6b9d" stroke-width="2"%3E%3Crect x="3" y="3" width="18" height="18" rx="2"%3E%3C/rect%3E%3Ccircle cx="8.5" cy="8.5" r="1.5"%3E%3C/circle%3E%3Cpolyline points="21 15 16 10 5 21"%3E%3C/polyline%3E%3C/svg%3E';
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

// Update status pesanan
function updateOrderStatus(orderNumber) {
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    const orderIndex = orders.findIndex(o => o.order_number === orderNumber);
    
    if(orderIndex !== -1) {
        const order = orders[orderIndex];
        const now = new Date();
        const orderDate = new Date(order.order_date);
        const hoursDiff = (now - orderDate) / (1000 * 60 * 60);
        
        let newStatus = order.status;
        let newTracking = [...order.tracking_history];
        
        if(hoursDiff > 1 && order.status === 'pending') {
            newStatus = 'processing';
            newTracking.push({ status: 'processing', date: new Date().toISOString(), note: 'Pesanan sedang diproses oleh admin' });
        } else if(hoursDiff > 6 && order.status === 'processing') {
            newStatus = 'shipped';
            newTracking.push({ status: 'shipped', date: new Date().toISOString(), note: 'Pesanan sedang dalam perjalanan' });
        } else if(hoursDiff > 24 && order.status === 'shipped') {
            newStatus = 'delivered';
            newTracking.push({ status: 'delivered', date: new Date().toISOString(), note: 'Pesanan telah sampai tujuan. Terima kasih!' });
        }
        
        if(newStatus !== order.status) {
            orders[orderIndex].status = newStatus;
            orders[orderIndex].tracking_history = newTracking;
            localStorage.setItem('orders', JSON.stringify(orders));
        }
    }
}

// Simpan rating
function saveRating(orderNumber, productId, rating) {
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    const orderIndex = orders.findIndex(o => o.order_number === orderNumber);
    
    if (orderIndex !== -1) {
        orders[orderIndex].rating = rating;
        orders[orderIndex].rated_at = new Date().toISOString();
        localStorage.setItem('orders', JSON.stringify(orders));
        
        // Update rating produk
        const products = getProducts();
        const productIndex = products.findIndex(p => p.id == productId);
        if (productIndex !== -1) {
            let productRatings = orders.filter(o => {
                const prod = products.find(p => p.name === o.product_name);
                return prod && prod.id === productId && o.rating;
            }).map(o => o.rating);
            
            if (productRatings.length > 0) {
                const avgRating = productRatings.reduce((a, b) => a + b, 0) / productRatings.length;
                products[productIndex].avg_rating = Math.round(avgRating * 10) / 10;
                localStorage.setItem('products', JSON.stringify(products));
            }
        }
        
        alert('⭐ Terima kasih atas rating Anda!');
        displayTrackingResult(orderNumber);
    }
}

// Render rating stars
function renderRatingStars(orderNumber, productId, currentRating, isDelivered) {
    if (!isDelivered) {
        return `<div class="rating-section">
            <i class="fas fa-clock fa-2x text-muted mb-2"></i>
            <p class="mb-0">⭐ Rating akan tersedia setelah pesanan selesai (status Delivered)</p>
        </div>`;
    }
    
    if (currentRating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += `<i class="fas fa-star" style="color: ${i <= currentRating ? '#ffc107' : '#ddd'}; font-size: 1.3rem;"></i>`;
        }
        return `<div class="rating-section">
            <div class="rating-display">
                <strong><i class="fas fa-star text-warning"></i> Rating Anda:</strong><br>
                ${stars}
                <p class="mt-2 mb-0 text-muted small">Terima kasih sudah memberi rating! 🙏</p>
            </div>
        </div>`;
    }
    
    let stars = '';
    for (let i = 1; i <= 5; i++) {
        stars += `<i class="far fa-star" data-rating="${i}" style="cursor: pointer; font-size: 1.8rem; margin: 0 5px;" onclick="saveRating('${orderNumber}', ${productId}, ${i})"></i>`;
    }
    
    return `<div class="rating-section">
        <h6 class="mb-2"><i class="fas fa-star text-warning"></i> Beri Rating untuk Produk Ini</h6>
        <div class="rating-stars">${stars}</div>
        <p class="text-muted small mt-2">Klik bintang untuk memberi rating (1-5)</p>
    </div>`;
}

// Tampilkan hasil tracking
function displayTrackingResult(orderNumber) {
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    const order = orders.find(o => o.order_number === orderNumber);
    const products = getProducts();
    
    if(!order) {
        document.getElementById('resultContent').innerHTML = `
            <div class="text-center text-danger">
                <i class="fas fa-exclamation-triangle fa-4x mb-3"></i>
                <h4>Pesanan Tidak Ditemukan</h4>
                <p>Nomor pesanan <strong>${orderNumber}</strong> tidak ditemukan.</p>
                <p class="text-muted">Pastikan nomor pesanan yang Anda masukkan benar.</p>
            </div>
        `;
        document.getElementById('resultContainer').style.display = 'block';
        return;
    }
    
    // Cari product ID
    const product = products.find(p => order.product_name.includes(p.name));
    const productId = product ? product.id : 1;
    const isDelivered = order.status === 'delivered';
    
    let trackingHtml = `
        <div class="text-center mb-4">
            <i class="fas fa-gift fa-3x" style="color: #ff6b9d;"></i>
            <h3 class="mt-2">Detail Pesanan</h3>
            <p class="text-muted">Nomor Pesanan: <strong>${order.order_number}</strong></p>
            ${getStatusBadge(order.status)}
        </div>
        
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <div class="info-card">
                    <h6><i class="fas fa-user me-2" style="color: #ff6b9d;"></i> Informasi Pemesan</h6>
                    <hr>
                    <p class="mb-1"><strong>Nama:</strong> ${order.customer_name}</p>
                    <p class="mb-1"><strong>Email:</strong> ${order.customer_email}</p>
                    <p class="mb-1"><strong>Telepon:</strong> ${order.customer_phone}</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="info-card">
                    <h6><i class="fas fa-box me-2" style="color: #ff6b9d;"></i> Detail Pesanan</h6>
                    <hr>
                    <p class="mb-1"><strong>Produk:</strong> ${order.product_name}</p>
                    <p class="mb-1"><strong>Jumlah:</strong> ${order.quantity} pcs</p>
                    <p class="mb-1"><strong>Total:</strong> <span style="color: #ff6b9d; font-weight: bold;">Rp ${order.total_price.toLocaleString('id-ID')}</span></p>
                    <p class="mb-1"><strong>Tanggal Kirim:</strong> ${formatDate(order.delivery_date)}</p>
                    <p class="mb-1"><strong>Alamat:</strong> ${order.address}</p>
                </div>
            </div>
        </div>
        
        <div class="greeting-box mb-4">
            <i class="fas fa-envelope me-2" style="color: #ff6b9d;"></i>
            <strong>Kartu Ucapan:</strong>
            <p class="mb-0 mt-2">"${order.greeting_card}"</p>
        </div>
        
        <h6 class="mb-3"><i class="fas fa-history me-2" style="color: #ff6b9d;"></i> Riwayat Status Pesanan</h6>
        <div class="timeline">
    `;
    
    if (order.tracking_history && order.tracking_history.length > 0) {
        order.tracking_history.forEach(track => {
            let statusText = '';
            switch(track.status) {
                case 'pending': statusText = '📝 Pesanan Diterima'; break;
                case 'processing': statusText = '⚙️ Sedang Diproses'; break;
                case 'shipped': statusText = '🚚 Dalam Pengiriman'; break;
                case 'delivered': statusText = '✅ Pesanan Selesai'; break;
                default: statusText = track.status;
            }
            trackingHtml += `
                <div class="timeline-item">
                    <div class="timeline-icon"></div>
                    <div class="mb-2">
                        <strong>${statusText}</strong>
                        <div class="text-muted small">${formatDate(track.date)}</div>
                        <div class="mt-1">${track.note}</div>
                    </div>
                </div>
            `;
        });
    } else {
        trackingHtml += `<div class="text-muted">Belum ada riwayat tracking</div>`;
    }
    
    trackingHtml += `
        </div>
        ${renderRatingStars(order.order_number, productId, order.rating, isDelivered)}
    `;
    
    document.getElementById('resultContent').innerHTML = trackingHtml;
    document.getElementById('resultContainer').style.display = 'block';
    
    // Scroll ke hasil
    document.getElementById('resultContainer').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// Update navbar berdasarkan login
function updateNavbar() {
    const currentUser = localStorage.getItem('currentUser');
    const authNav = document.getElementById('authNav');
    
    if (currentUser) {
        const user = JSON.parse(currentUser);
        if (user.role === 'admin') {
            authNav.innerHTML = `<div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-cog"></i> ${user.name}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ url('/admin/dashboard') }}">Dashboard Admin</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#" onclick="logout()">Logout</a></li>
                </ul>
            </div>`;
        } else {
            authNav.innerHTML = `<div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> ${user.name}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ url('/user/dashboard') }}">Dashboard User</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#" onclick="logout()">Logout</a></li>
                </ul>
            </div>`;
        }
    } else {
        authNav.innerHTML = `<a class="nav-link" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt me-1"></i> Login</a>
                            <a class="nav-link" href="{{ url('/register') }}"><i class="fas fa-user-plus me-1"></i> Daftar</a>`;
    }
}

function logout() {
    localStorage.removeItem('currentUser');
    window.location.href = '{{ url("/") }}';
}

// Handle form submit
document.getElementById('trackingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const orderNumber = document.getElementById('orderNumber').value.trim().toUpperCase();
    
    if(orderNumber === '') {
        alert('Masukkan nomor pesanan terlebih dahulu');
        return;
    }
    
    updateOrderStatus(orderNumber);
    displayTrackingResult(orderNumber);
});

// Cek parameter URL
const urlParams = new URLSearchParams(window.location.search);
const orderParam = urlParams.get('order');
if(orderParam) {
    document.getElementById('orderNumber').value = orderParam;
    updateOrderStatus(orderParam);
    displayTrackingResult(orderParam);
}

updateNavbar();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>