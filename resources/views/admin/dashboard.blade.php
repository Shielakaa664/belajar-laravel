<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin ParselKu</title>
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

        .welcome-text {
            background: linear-gradient(135deg, #ff6b9d, #4facfe);
            padding: 8px 20px;
            border-radius: 30px;
            color: white;
            font-weight: 500;
            font-size: 0.85rem;
        }

        /* ========== STATS CARD ========== */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s;
            border-left: 4px solid #ff6b9d;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #ffe4ec, #e0f7fa);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: #ff6b9d;
        }

        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            color: #333;
        }

        .stat-info p {
            margin: 0;
            color: #6c757d;
            font-size: 0.8rem;
            font-weight: 500;
        }

        /* ========== CHART CARD ========== */
        .chart-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-top: 4px solid #ff6b9d;
        }

        .chart-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .chart-title i {
            color: #ff6b9d;
            margin-right: 10px;
        }

        canvas {
            max-height: 300px;
            width: 100%;
        }

        /* ========== RECENT ORDERS ========== */
        .recent-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-top: 4px solid #4facfe;
        }

        .recent-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .recent-title i {
            color: #4facfe;
            margin-right: 10px;
        }

        .view-all {
            font-size: 0.75rem;
            color: #ff6b9d;
            text-decoration: none;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .table-recent {
            width: 100%;
        }

        .table-recent th {
            padding: 12px 8px;
            font-size: 0.75rem;
            color: #6c757d;
            font-weight: 600;
            border-bottom: 1px solid #eee;
        }

        .table-recent td {
            padding: 12px 8px;
            font-size: 0.8rem;
            border-bottom: 1px solid #f5f5f5;
        }

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

        .btn-detail-small {
            background: #6c5ce7;
            border: none;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.65rem;
            color: white;
        }
        .btn-detail-small:hover {
            background: #5b4bc4;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 992px) {
            .sidebar { width: 80px; }
            .sidebar-header h4, .sidebar .nav-link span { display: none; }
            .sidebar .nav-link { justify-content: center; }
            .sidebar .nav-link i { margin-right: 0; }
            .main-content { margin-left: 80px; }
        }

        @media (max-width: 768px) {
            .main-content { padding: 15px; }
            .stats-row { grid-template-columns: 1fr 1fr; gap: 15px; }
            .stat-icon { width: 45px; height: 45px; font-size: 1.3rem; }
            .stat-info h3 { font-size: 1.3rem; }
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
                <a class="nav-link active" href="#" onclick="goTo('admin.dashboard')">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
                <a class="nav-link" href="#" onclick="goTo('admin.orders')">
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
                    <h2><i class="fas fa-chart-line me-2"></i> Dashboard</h2>
                    <p>Selamat datang di panel administrator ParselKu</p>
                </div>
                <div class="welcome-text" id="welcomeUser">
                    <i class="fas fa-user-circle me-2"></i> Loading...
                </div>
            </div>

            <!-- STATISTIK CARD -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                    <div class="stat-info">
                        <h3 id="totalOrders">0</h3>
                        <p>Total Pesanan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-info">
                        <h3 id="totalCustomers">0</h3>
                        <p>Total Pelanggan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-money-bill-wave"></i></div>
                    <div class="stat-info">
                        <h3 id="totalRevenue">Rp 0</h3>
                        <p>Total Pendapatan</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-boxes"></i></div>
                    <div class="stat-info">
                        <h3 id="totalProducts">0</h3>
                        <p>Total Produk</p>
                    </div>
                </div>
            </div>

            <!-- CHART PENDAPATAN -->
            <div class="chart-card">
                <div class="chart-title">
                    <i class="fas fa-chart-line"></i> Grafik Pendapatan (7 Hari Terakhir)
                </div>
                <canvas id="revenueChart" height="200"></canvas>
            </div>

            <!-- PESANAN TERBARU -->
            <div class="recent-card">
                <div class="recent-title">
                    <span><i class="fas fa-clock"></i> Pesanan Terbaru</span>
                    <a href="#" onclick="goTo('admin.orders')" class="view-all">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
                <div style="overflow-x: auto;">
                    <table class="table-recent">
                        <thead>
                            <tr>
                                <th>No Pesanan</th>
                                <th>Pembeli</th>
                                <th>Produk</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="recentOrdersList"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
let revenueChart = null;

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

function getStatusBadge(status) {
    const badges = {
        'pending': '<span class="status-badge status-pending"><i class="fas fa-clock me-1"></i> Pending</span>',
        'processing': '<span class="status-badge status-processing"><i class="fas fa-cogs me-1"></i> Processing</span>',
        'shipped': '<span class="status-badge status-shipped"><i class="fas fa-truck me-1"></i> Shipped</span>',
        'delivered': '<span class="status-badge status-delivered"><i class="fas fa-check-circle me-1"></i> Delivered</span>'
    };
    return badges[status] || badges['pending'];
}

function updateStats() {
    const orders = getOrders();
    const products = getProducts();
    
    // Total pesanan
    const totalOrders = orders.length;
    
    // Total pelanggan (unique email)
    const uniqueCustomers = [...new Set(orders.map(o => o.customer_email))];
    const totalCustomers = uniqueCustomers.length;
    
    // Total pendapatan
    const totalRevenue = orders.reduce((sum, order) => sum + order.total_price, 0);
    
    // Total produk
    const totalProducts = products.length;
    
    document.getElementById('totalOrders').innerText = totalOrders;
    document.getElementById('totalCustomers').innerText = totalCustomers;
    document.getElementById('totalRevenue').innerHTML = 'Rp ' + totalRevenue.toLocaleString('id-ID');
    document.getElementById('totalProducts').innerText = totalProducts;
    
    // Update welcome user
    const currentUser = localStorage.getItem('currentUser');
    if (currentUser) {
        const user = JSON.parse(currentUser);
        document.getElementById('welcomeUser').innerHTML = '<i class="fas fa-user-circle me-2"></i> ' + user.name;
    }
}

function updateChart() {
    const orders = getOrders();
    
    // Data 7 hari terakhir
    const last7Days = [];
    const labels = [];
    const salesData = [];
    
    for (let i = 6; i >= 0; i--) {
        const date = new Date();
        date.setDate(date.getDate() - i);
        const dateStr = date.toISOString().split('T')[0];
        const dayName = date.toLocaleDateString('id-ID', { weekday: 'short' });
        labels.push(dayName);
        
        const dailyTotal = orders
            .filter(order => order.order_date && order.order_date.split('T')[0] === dateStr)
            .reduce((sum, order) => sum + order.total_price, 0);
        salesData.push(dailyTotal);
    }
    
    const ctx = document.getElementById('revenueChart').getContext('2d');
    
    if (revenueChart) {
        revenueChart.destroy();
    }
    
    revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: salesData,
                borderColor: '#ff6b9d',
                backgroundColor: 'rgba(255, 107, 157, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#4facfe',
                pointBorderColor: 'white',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: { size: 11 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Rp ' + context.raw.toLocaleString('id-ID');
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
}

function showOrderDetail(orderNumber) {
    const orders = getOrders();
    const order = orders.find(o => o.order_number === orderNumber);
    if (order) {
        let statusText = '';
        switch(order.status) {
            case 'pending': statusText = 'Pending (Menunggu)'; break;
            case 'processing': statusText = 'Processing (Diproses)'; break;
            case 'shipped': statusText = 'Shipped (Dikirim)'; break;
            case 'delivered': statusText = 'Delivered (Selesai)'; break;
        }
        
        alert(`📦 DETAIL PESANAN\n\nNo Pesanan: ${order.order_number}\nNama: ${order.customer_name}\nProduk: ${order.product_name}\nJumlah: ${order.quantity} pcs\nTotal: Rp ${order.total_price.toLocaleString('id-ID')}\nAlamat: ${order.address}\nStatus: ${statusText}\nKartu Ucapan: "${order.greeting_card}"`);
    }
}

function loadRecentOrders() {
    const orders = getOrders();
    const recentOrders = orders.slice(-5).reverse();
    let html = '';
    
    for (let order of recentOrders) {
        html += `<tr>
            <td>${order.order_number}</td>
            <td>${order.customer_name}</td>
            <td>${order.product_name}<br><small>${order.quantity} pcs</small></td>
            <td><span class="fw-bold" style="color: #ff6b9d;">Rp ${order.total_price.toLocaleString('id-ID')}</span></td>
            <td>${getStatusBadge(order.status)}</td>
            <td><button class="btn-detail-small" onclick="showOrderDetail('${order.order_number}')">Detail</button></td>
        </tr>`;
    }
    
    if (recentOrders.length === 0) {
        html = '<tr><td colspan="6" class="text-center py-3 text-muted">Belum ada pesanan</td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td></tr>';
    }
    
    document.getElementById('recentOrdersList').innerHTML = html;
}

// Cek login admin
const currentUser = localStorage.getItem('currentUser');
if (!currentUser) window.location.href = '/login';
else {
    let user = JSON.parse(currentUser);
    if (user.role !== 'admin') window.location.href = '/login';
}

// Load data
updateStats();
updateChart();
loadRecentOrders();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>