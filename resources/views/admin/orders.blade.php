<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan - Admin ParselKu</title>
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
            background: #f0f2f5;
        }

        /* ========== LAYOUT ========== */
        .admin-container {
            display: flex;
            min-height: 100vh;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #2d1b4e 0%, #1a0f2e 100%);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .sidebar-header h4 {
            color: white;
            margin-top: 10px;
            font-weight: 600;
        }

        .sidebar .nav-link {
            color: #e0d4ff;
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 12px;
            transition: all 0.3s;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link i {
            width: 28px;
            font-size: 1.1rem;
            margin-right: 12px;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, #ff6b9d, #4facfe);
            color: white;
        }

        .sidebar hr {
            margin: 15px;
            border-color: rgba(255,255,255,0.1);
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            margin-left: 260px;
            padding: 25px 30px;
        }

        /* ========== HEADER ========== */
        .page-header {
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-title h2 {
            font-size: 1.6rem;
            font-weight: 600;
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin: 0;
        }

        .page-title p {
            color: #6c757d;
            margin: 5px 0 0;
            font-size: 0.85rem;
        }

        /* ========== STATS CARD ========== */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid #ff6b9d;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #ffe4ec, #e0f7fa);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: #ff6b9d;
        }

        .stat-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: #333;
        }

        .stat-info p {
            margin: 0;
            color: #6c757d;
            font-size: 0.75rem;
        }

        /* ========== SEARCH & FILTER ========== */
        .filter-bar {
            background: white;
            border-radius: 16px;
            padding: 15px 20px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #f8f9fa;
            padding: 8px 18px;
            border-radius: 50px;
        }

        .search-box i {
            color: #999;
        }

        .search-box input {
            border: none;
            background: transparent;
            padding: 8px 0;
            width: 250px;
            outline: none;
            font-size: 0.85rem;
        }

        .filter-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.7rem;
            font-weight: 500;
            border: none;
            background: #f0f2f5;
            color: #666;
            transition: all 0.2s;
        }

        .filter-btn.active, .filter-btn:hover {
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            color: white;
        }

        /* ========== TABLE ========== */
        .table-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8f9fa;
            color: #2d3436;
            font-weight: 600;
            padding: 14px 12px;
            border-bottom: 2px solid #e9ecef;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .table tbody td {
            padding: 14px 12px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.8rem;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
        }

        /* ========== STATUS BADGE ========== */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 30px;
            font-size: 0.65rem;
            font-weight: 600;
        }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #d1ecf1; color: #0c5460; }
        .status-shipped { background: #cce5ff; color: #004085; }
        .status-delivered { background: #d4edda; color: #155724; }

        /* ========== PAYMENT BADGE ========== */
        .payment-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 30px;
            font-size: 0.65rem;
            font-weight: 600;
        }
        .payment-bank { background: #e3f2fd; color: #1565c0; }
        .payment-qris { background: #e8f5e9; color: #2e7d32; }
        .payment-cod { background: #fff3e0; color: #e65100; }

        /* ========== STATUS SELECT ========== */
        .status-select {
            padding: 4px 10px;
            border-radius: 30px;
            border: 1px solid #e0e0e0;
            font-size: 0.7rem;
            font-weight: 500;
            background: white;
            cursor: pointer;
            transition: all 0.2s;
            width: 110px;
        }
        .status-select.pending { border-color: #ffc107; color: #856404; background: #fff3cd; }
        .status-select.processing { border-color: #17a2b8; color: #0c5460; background: #d1ecf1; }
        .status-select.shipped { border-color: #007bff; color: #004085; background: #cce5ff; }
        .status-select.delivered { border-color: #28a745; color: #155724; background: #d4edda; }

        /* ========== BUTTON ========== */
        .btn-detail {
            background: white;
            border: 1px solid #6c5ce7;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.65rem;
            color: #6c5ce7;
            transition: all 0.2s;
        }
        .btn-detail:hover {
            background: #6c5ce7;
            color: white;
        }

        /* ========== MODAL ========== */
        .modal-content {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }
        .modal-header {
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            color: white;
            border: none;
            padding: 18px 25px;
        }
        .modal-body {
            padding: 25px;
            max-height: 70vh;
            overflow-y: auto;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1200px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
        }
        
        @media (max-width: 992px) {
            .sidebar { width: 80px; }
            .sidebar-header h4, .sidebar .nav-link span { display: none; }
            .sidebar .nav-link { justify-content: center; }
            .sidebar .nav-link i { margin-right: 0; }
            .main-content { margin-left: 80px; }
        }

        @media (max-width: 768px) {
            .main-content { padding: 15px; }
            .filter-bar { flex-direction: column; align-items: stretch; }
            .search-box input { width: 100%; }
            .table-container { overflow-x: auto; }
            .table { min-width: 950px; }
            .stats-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-header">
                <i class="fas fa-gift fa-2x text-white"></i>
                <h4>ParselKu</h4>
            </div>
            <nav>
                <a class="nav-link" href="#" onclick="goTo('admin.dashboard')">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link active" href="#" onclick="goTo('admin.orders')">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pesanan</span>
                </a>
                <a class="nav-link" href="#" onclick="goTo('admin.products')">
                    <i class="fas fa-boxes"></i>
                    <span>Produk</span>
                </a>
                <a class="nav-link" href="#" onclick="goTo('home')">
                    <i class="fas fa-store"></i>
                    <span>Toko</span>
                </a>
                <hr>
                <a class="nav-link" href="#" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </nav>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="page-header">
                <div class="page-title">
                    <h2><i class="fas fa-shopping-cart me-2"></i> Manajemen Pesanan</h2>
                    <p>Kelola semua pesanan pelanggan dengan mudah</p>
                </div>
            </div>

            <!-- STATISTIK CARD -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div class="stat-info">
                        <h3 id="totalPending">0</h3>
                        <p>Pending</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-cogs"></i></div>
                    <div class="stat-info">
                        <h3 id="totalProcessing">0</h3>
                        <p>Processing</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-truck"></i></div>
                    <div class="stat-info">
                        <h3 id="totalShipped">0</h3>
                        <p>Shipped</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-info">
                        <h3 id="totalDelivered">0</h3>
                        <p>Delivered</p>
                    </div>
                </div>
            </div>

            <!-- FILTER BAR -->
            <div class="filter-bar">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Cari pesanan...">
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active" onclick="filterOrders('all')">📋 Semua</button>
                    <button class="filter-btn" onclick="filterOrders('pending')">⏳ Pending</button>
                    <button class="filter-btn" onclick="filterOrders('processing')">⚙️ Processing</button>
                    <button class="filter-btn" onclick="filterOrders('shipped')">🚚 Shipped</button>
                    <button class="filter-btn" onclick="filterOrders('delivered')">✅ Delivered</button>
                </div>
            </div>

            <!-- TABEL PESANAN -->
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Pelanggan</th>
                            <th>Produk</th>
                            <th>Total</th>
                            <th>Pembayaran</th>
                            <th>Status</th>
                            <th>Ucapan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="ordersList"></tbody>
                </table>
            </div>
        </div>
    </div>

<!-- MODAL DETAIL PESANAN -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i> Detail Pesanan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="detailContent">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
let currentFilter = 'all';

function goTo(route) {
    if (route === 'home') window.location.href = '/';
    else if (route === 'admin.dashboard') window.location.href = '/admin/dashboard';
    else if (route === 'admin.orders') window.location.href = '/admin/orders';
    else if (route === 'admin.products') window.location.href = '/admin/products';
}

function logout() { 
    localStorage.removeItem('currentUser'); 
    window.location.href = '/'; 
}

function getOrders() {
    return JSON.parse(localStorage.getItem('orders')) || [];
}

function saveOrders(orders) {
    localStorage.setItem('orders', JSON.stringify(orders));
}

function getStatusBadge(status) {
    const badges = {
        'pending': '<span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Pending</span>',
        'processing': '<span class="status-badge status-processing"><i class="fas fa-cogs me-1"></i> Processing</span>',
        'shipped': '<span class="status-badge status-shipped"><i class="fas fa-truck me-1"></i> Shipped</span>',
        'delivered': '<span class="status-badge status-delivered"><i class="fas fa-check-circle me-1"></i> Delivered</span>'
    };
    return badges[status] || badges['pending'];
}

function getPaymentBadge(paymentMethod) {
    if (paymentMethod === 'bank') {
        return '<span class="payment-badge payment-bank"><i class="fas fa-university me-1"></i> Bank</span>';
    } else if (paymentMethod === 'qris') {
        return '<span class="payment-badge payment-qris"><i class="fas fa-qrcode me-1"></i> QRIS</span>';
    } else if (paymentMethod === 'cod') {
        return '<span class="payment-badge payment-cod"><i class="fas fa-truck me-1"></i> COD</span>';
    }
    return '<span class="payment-badge">-</span>';
}

function updateStats() {
    const orders = getOrders();
    const pending = orders.filter(o => o.status === 'pending').length;
    const processing = orders.filter(o => o.status === 'processing').length;
    const shipped = orders.filter(o => o.status === 'shipped').length;
    const delivered = orders.filter(o => o.status === 'delivered').length;
    
    document.getElementById('totalPending').innerText = pending;
    document.getElementById('totalProcessing').innerText = processing;
    document.getElementById('totalShipped').innerText = shipped;
    document.getElementById('totalDelivered').innerText = delivered;
}

function updateStatus(orderNumber, newStatus) {
    let orders = getOrders();
    const orderIndex = orders.findIndex(o => o.order_number === orderNumber);
    
    if (orderIndex !== -1) {
        orders[orderIndex].status = newStatus;
        
        if (!orders[orderIndex].tracking_history) {
            orders[orderIndex].tracking_history = [];
        }
        
        let noteText = '';
        switch(newStatus) {
            case 'processing': noteText = 'Pesanan sedang diproses oleh admin'; break;
            case 'shipped': noteText = 'Pesanan telah dikirim dan sedang dalam perjalanan'; break;
            case 'delivered': noteText = 'Pesanan telah sampai tujuan. Terima kasih!'; break;
            default: noteText = `Status diubah menjadi ${newStatus}`;
        }
        
        orders[orderIndex].tracking_history.push({
            status: newStatus,
            date: new Date().toISOString(),
            note: noteText
        });
        
        saveOrders(orders);
        updateStats();
        loadOrders();
        
        alert(`✅ Status pesanan ${orderNumber} berhasil diubah menjadi ${newStatus.toUpperCase()}!`);
    }
}

function showDetail(order) {
    let statusText = '';
    switch(order.status) {
        case 'pending': statusText = 'Pending (Menunggu Konfirmasi)'; break;
        case 'processing': statusText = 'Processing (Sedang Diproses)'; break;
        case 'shipped': statusText = 'Shipped (Dalam Pengiriman)'; break;
        case 'delivered': statusText = 'Delivered (Pesanan Selesai)'; break;
    }
    
    let paymentText = '';
    let paymentIcon = '';
    if (order.payment_method === 'bank') {
        paymentText = 'Transfer Bank';
        paymentIcon = '<i class="fas fa-university fa-2x text-primary"></i>';
    } else if (order.payment_method === 'qris') {
        paymentText = 'QRIS (GoPay/OVO/DANA)';
        paymentIcon = '<i class="fas fa-qrcode fa-2x text-success"></i>';
    } else if (order.payment_method === 'cod') {
        paymentText = 'COD (Cash on Delivery)';
        paymentIcon = '<i class="fas fa-truck fa-2x text-warning"></i>';
    } else {
        paymentText = '-';
        paymentIcon = '<i class="fas fa-question fa-2x text-muted"></i>';
    }
    
    let ratingHtml = '';
    if (order.rating) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            stars += `<i class="fas fa-star" style="color: ${i <= order.rating ? '#ffc107' : '#ddd'}"></i>`;
        }
        ratingHtml = `
            <div class="mt-3 p-3" style="background: linear-gradient(135deg, #fff9e6, #fff3cd); border-radius: 12px;">
                <strong><i class="fas fa-star text-warning me-1"></i> Rating Pelanggan:</strong><br>
                ${stars} <strong class="ms-2">(${order.rating} dari 5)</strong>
                <br><small class="text-muted">Diberikan pada: ${new Date(order.rated_at).toLocaleString('id-ID')}</small>
            </div>
        `;
    } else if (order.status === 'delivered') {
        ratingHtml = `
            <div class="mt-3 p-3 bg-light rounded-3 text-muted text-center">
                <i class="fas fa-star me-1"></i> Pelanggan belum memberi rating
            </div>
        `;
    }
    
    let trackingHtml = '<h6 class="mt-3 fw-semibold mb-3"><i class="fas fa-history me-2" style="color: #ff6b9d;"></i>Riwayat Status:</h6><div style="border-left: 2px solid #e0e0e0; margin-left: 15px;">';
    if (order.tracking_history && order.tracking_history.length > 0) {
        order.tracking_history.forEach((track, idx) => {
            let statusIcon = '';
            let statusColor = '';
            if (track.status === 'pending') { statusIcon = '⏳'; statusColor = '#856404'; }
            else if (track.status === 'processing') { statusIcon = '⚙️'; statusColor = '#0c5460'; }
            else if (track.status === 'shipped') { statusIcon = '🚚'; statusColor = '#004085'; }
            else { statusIcon = '✅'; statusColor = '#155724'; }
            
            trackingHtml += `
                <div class="d-flex gap-3 mb-3" style="position: relative;">
                    <div style="min-width: 35px; text-align: center;">${statusIcon}</div>
                    <div>
                        <strong style="color: ${statusColor}">${track.status.toUpperCase()}</strong>
                        <div class="text-muted small">${new Date(track.date).toLocaleString('id-ID')}</div>
                        <div class="text-muted small">${track.note}</div>
                    </div>
                </div>
            `;
        });
    } else {
        trackingHtml += '<div class="text-muted p-3">Belum ada riwayat</div>';
    }
    trackingHtml += '</div>';
    
    let html = `
        <div class="row g-3">
            <div class="col-md-6">
                <div class="p-3" style="background: #f8f9fa; border-radius: 12px;">
                    <h6 class="fw-semibold mb-3"><i class="fas fa-user me-2" style="color: #ff6b9d;"></i>Informasi Pemesan</h6>
                    <table class="table table-sm table-borderless">
                        <tr><td style="width: 35%"><strong>Nama</strong></td><td>: ${order.customer_name}</td></tr>
                        <tr><td><strong>Email</strong></td><td>: ${order.customer_email}</td></tr>
                        <tr><td><strong>Telepon</strong></td><td>: ${order.customer_phone}</td></tr>
                        <tr><td><strong>Alamat</strong></td><td>: ${order.address}</td></tr>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3" style="background: #f8f9fa; border-radius: 12px;">
                    <h6 class="fw-semibold mb-3"><i class="fas fa-box me-2" style="color: #ff6b9d;"></i>Detail Pesanan</h6>
                    <table class="table table-sm table-borderless">
                        <tr><td style="width: 40%"><strong>No Pesanan</strong></td><td>: ${order.order_number}</td></tr>
                        <tr><td><strong>Produk</strong></td><td>: ${order.product_name} (${order.quantity} pcs)</td></tr>
                        <tr><td><strong>Total</strong></td><td>: <span class="fw-bold" style="color: #ff6b9d;">Rp ${order.total_price.toLocaleString('id-ID')}</span></td></tr>
                        <tr><td><strong>Tanggal Kirim</strong></td><td>: ${new Date(order.delivery_date).toLocaleDateString('id-ID')}</td></tr>
                        <tr><td><strong>Tanggal Pesan</strong></td><td>: ${new Date(order.order_date).toLocaleString('id-ID')}</td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-3 p-3" style="background: #f8f9fa; border-radius: 12px;">
            <div class="d-flex align-items-center gap-3">
                ${paymentIcon}
                <div>
                    <strong>Metode Pembayaran:</strong> ${paymentText}
                </div>
            </div>
        </div>
        <div class="mt-3 p-3" style="background: #f8f9fa; border-radius: 12px;">
            <h6 class="fw-semibold mb-2"><i class="fas fa-envelope me-2" style="color: #ff6b9d;"></i>Kartu Ucapan</h6>
            <div class="p-2" style="background: white; border-radius: 8px; border-left: 3px solid #ff6b9d;">
                <em>"${order.greeting_card}"</em>
            </div>
        </div>
        ${ratingHtml}
        <div class="mt-3 p-3" style="background: #f8f9fa; border-radius: 12px;">
            ${trackingHtml}
        </div>
    `;
    
    document.getElementById('detailContent').innerHTML = html;
    new bootstrap.Modal(document.getElementById('detailModal')).show();
}

function filterOrders(filter) {
    currentFilter = filter;
    
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active');
        if (btn.innerText.includes('Semua') && filter === 'all') btn.classList.add('active');
        else if (btn.innerText.toLowerCase().includes(filter) && filter !== 'all') btn.classList.add('active');
    });
    
    loadOrders();
}

function loadOrders() {
    let orders = getOrders();
    let searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    let filteredOrders = orders;
    
    if (currentFilter !== 'all') {
        filteredOrders = filteredOrders.filter(order => order.status === currentFilter);
    }
    
    if (searchTerm) {
        filteredOrders = filteredOrders.filter(order => 
            order.order_number.toLowerCase().includes(searchTerm) ||
            order.customer_name.toLowerCase().includes(searchTerm) ||
            order.product_name.toLowerCase().includes(searchTerm) ||
            order.customer_phone.includes(searchTerm)
        );
    }
    
    let html = '';
    if (filteredOrders.length === 0) {
        html = '<tr><td colspan="8" class="text-center py-5"><i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i><h5>Tidak ada pesanan</h5><p class="text-muted">Belum ada pesanan yang ditemukan</p></td></tr>';
    } else {
        for (let order of filteredOrders.reverse()) {
            let greetingShort = order.greeting_card ? order.greeting_card.substring(0, 20) + (order.greeting_card.length > 20 ? '...' : '') : '-';
            
            html += `<tr>
                <td>
                    <strong>${order.order_number}</strong><br>
                    <small class="text-muted">${new Date(order.order_date).toLocaleDateString('id-ID')}</small>
                </td>
                <td>
                    ${order.customer_name}<br>
                    <small class="text-muted"><i class="fas fa-phone-alt me-1"></i>${order.customer_phone}</small>
                </td>
                <td>
                    ${order.product_name}<br>
                    <small class="text-muted"><i class="fas fa-box me-1"></i>${order.quantity} pcs</small>
                </td>
                <td><span class="fw-bold" style="color: #ff6b9d;">Rp ${order.total_price.toLocaleString('id-ID')}</span></td>
                <td>${getPaymentBadge(order.payment_method)}</td>
                <td>
                    <select class="status-select ${order.status}" onchange="updateStatus('${order.order_number}', this.value)">
                        <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>⏳ Pending</option>
                        <option value="processing" ${order.status === 'processing' ? 'selected' : ''}>⚙️ Processing</option>
                        <option value="shipped" ${order.status === 'shipped' ? 'selected' : ''}>🚚 Shipped</option>
                        <option value="delivered" ${order.status === 'delivered' ? 'selected' : ''}>✅ Delivered</option>
                    </select>
                    <div class="mt-1">${getStatusBadge(order.status)}</div>
                </td>
                <td><small class="text-muted" title="${order.greeting_card.replace(/"/g, '&quot;')}">"${greetingShort}"</small></td>
                <td>
                    <button class="btn-detail" onclick='showDetail(${JSON.stringify(order).replace(/'/g, "&#39;")})'>
                        <i class="fas fa-eye me-1"></i> Detail
                    </button>
                </td>
            </tr>`;
        }
    }
    
    document.getElementById('ordersList').innerHTML = html;
}

// Cek login admin
const currentUser = localStorage.getItem('currentUser');
if (!currentUser) window.location.href = '/login';
else {
    let user = JSON.parse(currentUser);
    if (user.role !== 'admin') window.location.href = '/login';
}

document.getElementById('searchInput').addEventListener('keyup', function() {
    loadOrders();
});

updateStats();
loadOrders();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>