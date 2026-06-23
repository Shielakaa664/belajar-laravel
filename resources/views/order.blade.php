<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Parsel - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px 0; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 500; }
        .nav-link:hover { color: #ffd700 !important; }
        .order-form { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); }
        .btn-submit { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; padding: 12px 30px; border-radius: 50px; font-weight: bold; width: 100%; }
        .footer { background: #2d3748; color: #cbd5e0; padding: 40px 0 20px; margin-top: 50px; text-align: center; }
        .greeting-card-preview { background: #f8f9fa; border-radius: 10px; padding: 15px; margin-top: 10px; border-left: 4px solid #667eea; display: none; }
        .stock-warning { color: red; font-size: 12px; display: none; }
        .payment-method-card {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .payment-method-card:hover {
            border-color: #667eea;
            background: #f8f9fa;
        }
        .payment-method-card.selected {
            border-color: #667eea;
            background: linear-gradient(135deg, #f0e6ff, #e8d5ff);
        }
        .payment-method-card i {
            font-size: 30px;
            width: 50px;
            text-align: center;
        }
        .payment-detail {
            display: none;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
        }
        .payment-detail.show {
            display: block;
        }
        .bank-detail {
            background: white;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 10px;
            border-left: 3px solid #667eea;
        }
        .product-preview-container {
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 15px;
            display: none;
        }
        .product-preview-image {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            border: 3px solid white;
        }
        .optional-text {
            font-size: 11px;
            color: #999;
            margin-left: 5px;
        }
        .form-label .optional {
            font-weight: normal;
            font-size: 11px;
            color: #999;
        }
    </style>
</head>
<body>

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

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="order-form">
                <h2 class="text-center mb-4"><i class="fas fa-shopping-cart me-2"></i> Form Pemesanan Parsel</h2>
                <p class="text-center text-muted mb-4">Isi data diri dan pilih parsel favorit Anda</p>
                
                <!-- PREVIEW FOTO PRODUK -->
                <div id="productPreviewContainer" class="product-preview-container">
                    <img id="productPreviewImage" class="product-preview-image" src="" alt="Preview Produk">
                    <div id="productPreviewName" class="mt-2 fw-bold"></div>
                </div>
                
                <form id="orderForm">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" id="customerName" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Email 
                                <span class="optional-text">(Opsional)</span>
                            </label>
                            <input type="email" id="customerEmail" class="form-control" placeholder="contoh@email.com">
                            <small class="text-muted">Isi jika ingin menerima notifikasi via email</small>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="tel" id="customerPhone" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Pilih Produk <span class="text-danger">*</span></label>
                            <select id="productSelect" class="form-select" required>
                                <option value="">-- Pilih Produk --</option>
                                <option value="1" data-price="350000" data-stock="10" data-name="Parsel Lebaran Premium">Parsel Lebaran Premium - Rp 350.000</option>
                                <option value="2" data-price="225000" data-stock="8" data-name="Parsel Ultah Spesial">Parsel Ultah Spesial - Rp 225.000</option>
                                <option value="3" data-price="250000" data-stock="5" data-name="Parsel Sehat">Parsel Sehat - Rp 250.000</option>
                                <option value="4" data-price="300000" data-stock="3" data-name="Parsel Valentine">Parsel Valentine - Rp 300.000</option>
                                <option value="5" data-price="400000" data-stock="4" data-name="Parsel Pernikahan">Parsel Pernikahan - Rp 400.000</option>
                                <option value="6" data-price="275000" data-stock="6" data-name="Parsel Baby Gift">Parsel Baby Gift - Rp 275.000</option>
                            </select>
                            <div id="stockWarning" class="stock-warning mt-1">⚠️ Stok produk ini sedang habis!</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" id="quantity" class="form-control" value="1" min="1" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Alamat Pengiriman <span class="text-danger">*</span></label>
                        <textarea id="address" class="form-control" rows="3" required placeholder="Jl. Contoh No. 123, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Tanggal Kirim <span class="text-danger">*</span></label>
                        <input type="date" id="deliveryDate" class="form-control" required>
                    </div>
                    
                    <!-- KARTU UCAPAN -->
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-envelope me-2"></i> Kartu Ucapan</label>
                        <textarea id="greetingCard" class="form-control" rows="3" placeholder="Tulis pesan spesial Anda di sini..."></textarea>
                        <div id="greetingPreview" class="greeting-card-preview">
                            <i class="fas fa-quote-left me-2 text-primary"></i>
                            <span id="previewText"></span>
                        </div>
                    </div>
                    
                    <!-- METODE PEMBAYARAN -->
                    <div class="mb-4">
                        <label class="form-label fw-bold"><i class="fas fa-credit-card me-2"></i> Metode Pembayaran <span class="text-danger">*</span></label>
                        
                        <!-- Transfer Bank -->
                        <div class="payment-method-card" onclick="selectPayment('bank')" id="paymentBank">
                            <i class="fas fa-university" style="color: #004d73;"></i>
                            <div>
                                <strong>Transfer Bank</strong><br>
                                <small class="text-muted">BCA, Mandiri, BRI, BNI</small>
                            </div>
                            <div class="ms-auto">
                                <i class="far fa-circle" id="bankIcon"></i>
                            </div>
                        </div>
                        <div id="bankDetail" class="payment-detail">
                            <div class="bank-detail">
                                <i class="fas fa-university me-2"></i> <strong>BCA</strong><br>
                                No. Rekening: 1234567890<br>
                                a.n. ParselKu Official
                            </div>
                            <div class="bank-detail">
                                <i class="fas fa-university me-2"></i> <strong>Mandiri</strong><br>
                                No. Rekening: 9876543210<br>
                                a.n. ParselKu Official
                            </div>
                            <div class="bank-detail">
                                <i class="fas fa-university me-2"></i> <strong>BRI</strong><br>
                                No. Rekening: 5555555555<br>
                                a.n. ParselKu Official
                            </div>
                        </div>
                        
                        <!-- QRIS -->
                        <div class="payment-method-card" onclick="selectPayment('qris')" id="paymentQris">
                            <i class="fas fa-qrcode" style="color: #00a86b;"></i>
                            <div>
                                <strong>QRIS</strong><br>
                                <small class="text-muted">Scan menggunakan GoPay, OVO, DANA, LinkAja</small>
                            </div>
                            <div class="ms-auto">
                                <i class="far fa-circle" id="qrisIcon"></i>
                            </div>
                        </div>
                        <div id="qrisDetail" class="payment-detail text-center">
                            <i class="fas fa-qrcode fa-4x mb-2" style="color: #00a86b;"></i>
                            <p>Scan QR Code berikut untuk melakukan pembayaran:</p>
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=ParselKu-Payment" alt="QR Code" style="width: 150px; margin: 10px auto;">
                            <p class="text-muted small">Atau transfer ke: <br> <strong>081234567890</strong> (E-Wallet)</p>
                        </div>
                        
                        <!-- COD -->
                        <div class="payment-method-card" onclick="selectPayment('cod')" id="paymentCod">
                            <i class="fas fa-truck" style="color: #ff6b9d;"></i>
                            <div>
                                <strong>COD (Cash on Delivery)</strong><br>
                                <small class="text-muted">Bayar saat barang diterima</small>
                            </div>
                            <div class="ms-auto">
                                <i class="far fa-circle" id="codIcon"></i>
                            </div>
                        </div>
                        <div id="codDetail" class="payment-detail">
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle me-2"></i>
                                Anda akan membayar saat pesanan tiba di alamat tujuan. Siapkan uang tunai sesuai total belanja.
                            </div>
                        </div>
                        
                        <input type="hidden" id="paymentMethod" name="payment_method" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Total Harga</label>
                        <h3 id="totalPrice" class="text-primary">Rp 0</h3>
                    </div>
                    
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-check-circle me-2"></i> Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <p>&copy; 2025 ParselKu. Kirim kebahagiaan dengan mudah.</p>
    </div>
</div>

<script>
let selectedPayment = null;

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

function logout() { localStorage.removeItem('currentUser'); window.location.href = '{{ url("/") }}'; }

// Select Payment Method
function selectPayment(method) {
    selectedPayment = method;
    document.getElementById('paymentMethod').value = method;
    
    // Reset all icons
    document.getElementById('bankIcon').className = 'far fa-circle';
    document.getElementById('qrisIcon').className = 'far fa-circle';
    document.getElementById('codIcon').className = 'far fa-circle';
    
    // Reset all details
    document.getElementById('bankDetail').classList.remove('show');
    document.getElementById('qrisDetail').classList.remove('show');
    document.getElementById('codDetail').classList.remove('show');
    
    // Remove selected class from all cards
    document.getElementById('paymentBank').classList.remove('selected');
    document.getElementById('paymentQris').classList.remove('selected');
    document.getElementById('paymentCod').classList.remove('selected');
    
    // Set selected icon and show detail
    if (method === 'bank') {
        document.getElementById('bankIcon').className = 'fas fa-check-circle';
        document.getElementById('bankDetail').classList.add('show');
        document.getElementById('paymentBank').classList.add('selected');
    } else if (method === 'qris') {
        document.getElementById('qrisIcon').className = 'fas fa-check-circle';
        document.getElementById('qrisDetail').classList.add('show');
        document.getElementById('paymentQris').classList.add('selected');
    } else if (method === 'cod') {
        document.getElementById('codIcon').className = 'fas fa-check-circle';
        document.getElementById('codDetail').classList.add('show');
        document.getElementById('paymentCod').classList.add('selected');
    }
}

// Data produk
const defaultImage = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%23ff6b9d" stroke-width="2"%3E%3Crect x="3" y="3" width="18" height="18" rx="2"%3E%3C/rect%3E%3Ccircle cx="8.5" cy="8.5" r="1.5"%3E%3C/circle%3E%3Cpolyline points="21 15 16 10 5 21"%3E%3C/polyline%3E%3C/svg%3E';

function initProducts() {
    if(!localStorage.getItem('products')) {
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
}

function updateStock(productId, newStock) {
    let products = JSON.parse(localStorage.getItem('products'));
    const index = products.findIndex(p => p.id == productId);
    if(index !== -1) {
        products[index].stock = newStock;
        localStorage.setItem('products', JSON.stringify(products));
    }
}

function checkStock(productId) {
    let products = JSON.parse(localStorage.getItem('products'));
    const product = products.find(p => p.id == productId);
    return product ? product.stock : 0;
}

function updateTotal() {
    const select = document.getElementById('productSelect');
    const selectedOption = select.options[select.selectedIndex];
    const price = parseInt(selectedOption.getAttribute('data-price')) || 0;
    const quantity = parseInt(document.getElementById('quantity').value) || 0;
    const total = price * quantity;
    document.getElementById('totalPrice').innerHTML = 'Rp ' + total.toLocaleString('id-ID');
}

function updateGreetingPreview() {
    const greetingText = document.getElementById('greetingCard').value;
    const previewDiv = document.getElementById('greetingPreview');
    const previewText = document.getElementById('previewText');
    
    if(greetingText.trim() !== '') {
        previewText.innerHTML = greetingText;
        previewDiv.style.display = 'block';
    } else {
        previewDiv.style.display = 'none';
    }
}

function updateProductPreview() {
    const select = document.getElementById('productSelect');
    const selectedOption = select.options[select.selectedIndex];
    const productId = select.value;
    const previewContainer = document.getElementById('productPreviewContainer');
    const previewImage = document.getElementById('productPreviewImage');
    const previewName = document.getElementById('productPreviewName');
    
    if(productId) {
        const productName = selectedOption.getAttribute('data-name');
        const products = JSON.parse(localStorage.getItem('products')) || [];
        const product = products.find(p => p.id == parseInt(productId));
        
        if(product && product.image) {
            previewImage.src = product.image;
        } else {
            previewImage.src = defaultImage;
        }
        
        previewName.innerHTML = productName;
        previewContainer.style.display = 'block';
    } else {
        previewContainer.style.display = 'none';
    }
}

function checkSelectedStock() {
    const select = document.getElementById('productSelect');
    const selectedOption = select.options[select.selectedIndex];
    const productId = select.value;
    const stockWarning = document.getElementById('stockWarning');
    
    if(productId) {
        const actualStock = checkStock(productId);
        
        if(actualStock <= 0) {
            stockWarning.style.display = 'block';
            document.getElementById('quantity').disabled = true;
        } else {
            stockWarning.style.display = 'none';
            document.getElementById('quantity').disabled = false;
        }
    }
}

function generateOrderNumber() {
    const date = new Date();
    const year = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day = String(date.getDate()).padStart(2, '0');
    const random = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
    return `PSL-${year}${month}${day}-${random}`;
}

function saveOrder(orderData) {
    let orders = JSON.parse(localStorage.getItem('orders')) || [];
    orders.push(orderData);
    localStorage.setItem('orders', JSON.stringify(orders));
}

function getPaymentMethodText(method) {
    const methods = {
        'bank': 'Transfer Bank (BCA/Mandiri/BRI)',
        'qris': 'QRIS (GoPay/OVO/DANA)',
        'cod': 'COD (Cash on Delivery)'
    };
    return methods[method] || method;
}

document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (!selectedPayment) {
        alert('Silakan pilih metode pembayaran terlebih dahulu!');
        return;
    }
    
    const productSelect = document.getElementById('productSelect');
    const selectedOption = productSelect.options[productSelect.selectedIndex];
    const productId = productSelect.value;
    const productName = selectedOption.getAttribute('data-name');
    const quantity = parseInt(document.getElementById('quantity').value);
    const currentStock = checkStock(productId);
    
    if(currentStock < quantity) {
        alert('Maaf, stok tidak mencukupi! Stok tersedia: ' + currentStock);
        return;
    }
    
    const newStock = currentStock - quantity;
    updateStock(productId, newStock);
    
    const orderNumber = generateOrderNumber();
    const customerEmail = document.getElementById('customerEmail').value;
    
    const orderData = {
        order_number: orderNumber,
        customer_name: document.getElementById('customerName').value,
        customer_email: customerEmail || '-', // Jika kosong, simpan sebagai '-'
        customer_phone: document.getElementById('customerPhone').value,
        product_name: productName,
        quantity: quantity,
        total_price: parseInt(selectedOption.getAttribute('data-price')) * quantity,
        address: document.getElementById('address').value,
        delivery_date: document.getElementById('deliveryDate').value,
        greeting_card: document.getElementById('greetingCard').value || 'Tidak ada ucapan',
        payment_method: selectedPayment,
        payment_method_text: getPaymentMethodText(selectedPayment),
        payment_status: 'pending',
        status: 'pending',
        order_date: new Date().toISOString(),
        tracking_history: [{ status: 'pending', date: new Date().toISOString(), note: 'Pesanan diterima' }]
    };
    
    saveOrder(orderData);
    
    let paymentInfo = '';
    if (selectedPayment === 'bank') {
        paymentInfo = '\n\n💳 Informasi Pembayaran:\nTransfer ke salah satu rekening:\nBCA: 1234567890 a.n ParselKu\nMandiri: 9876543210 a.n ParselKu\nBRI: 5555555555 a.n ParselKu';
    } else if (selectedPayment === 'qris') {
        paymentInfo = '\n\n📱 Informasi Pembayaran:\nScan QR Code atau transfer ke:\nE-Wallet: 081234567890';
    } else {
        paymentInfo = '\n\n🚚 Informasi Pembayaran:\nBayar tunai saat pesanan tiba (COD)';
    }
    
    alert('✅ Pesanan Berhasil!\n\nNomor Pesanan: ' + orderNumber + '\nMetode Pembayaran: ' + getPaymentMethodText(selectedPayment) + paymentInfo + '\n\nSimpan nomor ini untuk melacak pesanan Anda.');
    
    document.getElementById('orderForm').reset();
    document.getElementById('totalPrice').innerHTML = 'Rp 0';
    document.getElementById('greetingPreview').style.display = 'none';
    document.getElementById('productPreviewContainer').style.display = 'none';
    selectedPayment = null;
    document.getElementById('paymentMethod').value = '';
    document.getElementById('bankIcon').className = 'far fa-circle';
    document.getElementById('qrisIcon').className = 'far fa-circle';
    document.getElementById('codIcon').className = 'far fa-circle';
    document.getElementById('bankDetail').classList.remove('show');
    document.getElementById('qrisDetail').classList.remove('show');
    document.getElementById('codDetail').classList.remove('show');
    document.getElementById('paymentBank').classList.remove('selected');
    document.getElementById('paymentQris').classList.remove('selected');
    document.getElementById('paymentCod').classList.remove('selected');
    
    window.location.href = '{{ url("/lacak") }}?order=' + orderNumber;
});

document.getElementById('productSelect').addEventListener('change', function() {
    updateTotal();
    checkSelectedStock();
    updateProductPreview();
});
document.getElementById('quantity').addEventListener('input', updateTotal);
document.getElementById('greetingCard').addEventListener('input', updateGreetingPreview);

const tomorrow = new Date();
tomorrow.setDate(tomorrow.getDate() + 1);
document.getElementById('deliveryDate').min = tomorrow.toISOString().split('T')[0];

initProducts();
updateTotal();
updateNavbar();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>