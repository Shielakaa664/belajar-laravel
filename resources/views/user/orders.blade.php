<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .sidebar .nav-link { color: white; padding: 12px 20px; margin: 5px 0; border-radius: 10px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,0.2); }
        .content { padding: 20px; background: #f8f9fa; min-height: 100vh; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 p-0">
                <div class="sidebar p-3">
                    <h4 class="text-white text-center mb-4"><i class="fas fa-gift me-2"></i>ParselKu</h4>
                    <hr class="bg-light">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="#" onclick="goTo('user.dashboard')"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                        <a class="nav-link active" href="#" onclick="goTo('user.orders')"><i class="fas fa-shopping-cart me-2"></i> Pesanan Saya</a>
                        <a class="nav-link" href="#" onclick="goTo('order')"><i class="fas fa-plus-circle me-2"></i> Pesan Baru</a>
                        <a class="nav-link" href="#" onclick="goTo('tracking')"><i class="fas fa-search me-2"></i> Lacak Pesanan</a>
                        <hr class="bg-light">
                        <a class="nav-link" href="#" onclick="logout()"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                    </nav>
                </div>
            </div>
            
            <div class="col-md-9 col-lg-10">
                <div class="content">
                    <h2><i class="fas fa-shopping-cart me-2"></i> Pesanan Saya</h2>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr><th>No Pesanan</th><th>Produk</th><th>Jumlah</th><th>Total</th><th>Status</th><th>Kartu Ucapan</th><th>Tanggal Pesan</th></tr>
                            </thead>
                            <tbody id="ordersList"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
function checkLogin() {
    const currentUser = localStorage.getItem('currentUser');
    if (!currentUser) { window.location.href = '/login'; return null; }
    const user = JSON.parse(currentUser);
    if (user.role !== 'user') { window.location.href = '/login'; return null; }
    return user;
}

function goTo(route) {
    if (route === 'home') window.location.href = '/';
    else if (route === 'user.dashboard') window.location.href = '/user/dashboard';
    else if (route === 'user.orders') window.location.href = '/user/orders';
    else if (route === 'order') window.location.href = '/pesan';
    else if (route === 'tracking') window.location.href = '/lacak';
}

function logout() { localStorage.removeItem('currentUser'); window.location.href = '/'; }

function getOrders() { return JSON.parse(localStorage.getItem('orders')) || []; }

function getUserOrders() {
    const currentUser = JSON.parse(localStorage.getItem('currentUser'));
    if (!currentUser) return [];
    const allOrders = getOrders();
    return allOrders.filter(order => order.customer_email === currentUser.email);
}

function loadOrders() {
    const orders = getUserOrders();
    let html = '';
    
    orders.reverse().forEach(order => {
        let statusBadge = '';
        if(order.status === 'pending') statusBadge = '<span class="badge bg-warning">⏳ Pending</span>';
        else if(order.status === 'processing') statusBadge = '<span class="badge bg-info">⚙️ Processing</span>';
        else if(order.status === 'shipped') statusBadge = '<span class="badge bg-primary">🚚 Shipped</span>';
        else if(order.status === 'delivered') statusBadge = '<span class="badge bg-success">✅ Delivered</span>';
        
        html += `<tr>
            <td><strong>${order.order_number}</strong></td>
            <td>${order.product_name}</td>
            <td>${order.quantity} pcs</small></td>
            <td>Rp ${order.total_price.toLocaleString('id-ID')}</td>
            <td>${statusBadge}</td>
            <td><small>"${order.greeting_card ? order.greeting_card.substring(0, 50) : '-'}..."</small></td>
            <td>${new Date(order.order_date).toLocaleDateString('id-ID')}</td>
        </tr>`;
    });
    
    document.getElementById('ordersList').innerHTML = html || '<tr><td colspan="7" class="text-center">Belum ada pesanan</td>' . '</tr>';
}

checkLogin();
loadOrders();
</script>
</body>
</html>