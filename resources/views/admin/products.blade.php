<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Admin ParselKu</title>
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
            padding: 20px;
        }

        /* ========== HEADER ========== */
        .page-title {
            margin-bottom: 25px;
        }

        .page-title h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #333;
            margin: 0;
        }

        .page-title p {
            color: #6c757d;
            margin: 5px 0 0;
            font-size: 0.85rem;
        }

        /* ========== BUTTON ========== */
        .btn-add {
            background: linear-gradient(135deg, #28a745, #20c997);
            border: none;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 500;
            margin-bottom: 20px;
            float: right;
        }

        .btn-add:hover {
            transform: translateY(-2px);
        }

        /* ========== TABLE ========== */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            clear: both;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8f9fa;
            color: #495057;
            font-weight: 600;
            padding: 15px 12px;
            border-bottom: 2px solid #e9ecef;
            font-size: 0.85rem;
        }

        .table tbody td {
            padding: 12px;
            vertical-align: middle;
            border-bottom: 1px solid #eee;
        }

        .table tbody tr:hover {
            background: #f8f9fa;
        }

        /* ========== PRODUCT IMAGE ========== */
        .product-img {
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 1px solid #ddd;
        }

        /* ========== EDITABLE FIELD ========== */
        .edit-text {
            cursor: pointer;
            padding: 4px 8px;
            border-radius: 6px;
            transition: all 0.2s;
            display: inline-block;
        }

        .edit-text:hover {
            background: #f0f0f0;
        }

        .edit-text i {
            font-size: 10px;
            color: #888;
            margin-right: 6px;
        }

        /* ========== STOCK BADGE ========== */
        .badge-stock {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .badge-success { background: #d4edda; color: #155724; }
        .badge-warning { background: #fff3cd; color: #856404; }
        .badge-danger { background: #f8d7da; color: #721c24; }

        /* ========== EDIT BUTTON ========== */
        .btn-edit {
            background: #6c5ce7;
            border: none;
            padding: 5px 15px;
            border-radius: 6px;
            font-size: 0.75rem;
            color: white;
        }

        .btn-edit:hover {
            background: #5b4bc4;
            color: white;
        }

        .dropdown-menu {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
            padding: 8px 0;
        }

        .dropdown-item {
            padding: 8px 20px;
            font-size: 0.8rem;
        }

        .dropdown-item i {
            width: 25px;
            margin-right: 8px;
        }

        /* ========== MODAL ========== */
        .modal-content {
            border-radius: 12px;
        }

        .modal-header {
            background: #6c5ce7;
            color: white;
            border: none;
        }

        .preview-img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            margin: 10px auto;
            display: block;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .sidebar-header h4,
            .sidebar .nav-link span {
                display: none;
            }
            .sidebar .nav-link {
                justify-content: center;
            }
            .sidebar .nav-link i {
                margin-right: 0;
            }
            .main-content {
                margin-left: 70px;
            }
            .table-card {
                overflow-x: auto;
            }
            .table {
                min-width: 600px;
            }
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
                <a class="nav-link" href="#" onclick="goTo('admin.orders')">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Pesanan</span>
                </a>
                <a class="nav-link active" href="#" onclick="goTo('admin.products')">
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
            <div class="page-title">
                <h2>Produk</h2>
                <p>Kelola semua produk parsel Anda</p>
            </div>

            <button class="btn btn-add" onclick="addNewProduct()">
                <i class="fas fa-plus me-2"></i> Tambah Produk
            </button>

            <div class="table-card">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 70px;">Foto</th>
                            <th style="width: 50px;">ID</th>
                            <th>Nama</th>
                            <th style="width: 130px;">Harga</th>
                            <th style="width: 100px;">Stok</th>
                            <th style="width: 80px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="productsList"></tbody>
                </table>
            </div>
        </div>
    </div>

<!-- MODAL EDIT FOTO -->
<div class="modal fade" id="photoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-image me-2"></i> Edit Foto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3">
                    <img id="currentPhotoPreview" class="preview-img" src="" style="display: none;">
                    <div id="noPhotoText" class="text-muted py-3">Belum ada foto</div>
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label">Upload Foto Baru</label>
                    <input type="file" id="photoFile" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif">
                </div>
                <div id="newPreviewContainer" class="text-center mb-3" style="display: none;">
                    <img id="newPhotoPreview" class="preview-img" src="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="deletePhoto()">Hapus Foto</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="uploadPhoto()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH PRODUK -->
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus me-2"></i> Tambah Produk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" id="newProductName" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga (Rp)</label>
                    <input type="number" id="newProductPrice" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok Awal</label>
                    <input type="number" id="newProductStock" class="form-control" value="0">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto (Opsional)</label>
                    <input type="file" id="newProductPhoto" class="form-control" accept="image/jpeg,image/png,image/jpg,image/gif">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="saveNewProduct()">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
const defaultImage = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="%236c5ce7" stroke-width="2"%3E%3Crect x="3" y="3" width="18" height="18" rx="2"%3E%3C/rect%3E%3Ccircle cx="8.5" cy="8.5" r="1.5"%3E%3C/circle%3E%3Cpolyline points="21 15 16 10 5 21"%3E%3C/polyline%3E%3C/svg%3E';

const initialProducts = [
    { id: 1, name: 'Parsel Lebaran Premium', price: 350000, stock: 0, image: defaultImage },
    { id: 2, name: 'Parsel Ultah Spesial', price: 225000, stock: 2, image: defaultImage },
    { id: 3, name: 'Parsel Sehat', price: 250000, stock: 5, image: defaultImage },
    { id: 4, name: 'Parsel Valentine', price: 300000, stock: 3, image: defaultImage },
    { id: 5, name: 'Parsel Pernikahan', price: 400000, stock: 4, image: defaultImage },
    { id: 6, name: 'Parsel Baby Gift', price: 275000, stock: 6, image: defaultImage }
];

let currentProductId = null;

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

function getProducts() {
    if (!localStorage.getItem('products')) { 
        localStorage.setItem('products', JSON.stringify(initialProducts)); 
    }
    return JSON.parse(localStorage.getItem('products'));
}

function saveProducts(products) { 
    localStorage.setItem('products', JSON.stringify(products)); 
    loadProducts();
}

function editName(id, name) {
    let newName = prompt('Edit nama produk:', name);
    if (newName && newName.trim()) {
        let products = getProducts();
        let idx = products.findIndex(p => p.id == id);
        if (idx !== -1) { products[idx].name = newName.trim(); saveProducts(products); alert('Nama berhasil diubah!'); }
    }
}

function editPrice(id, price) {
    let newPrice = prompt('Edit harga produk (Rp):', price);
    if (newPrice && !isNaN(newPrice) && parseInt(newPrice) > 0) {
        let products = getProducts();
        let idx = products.findIndex(p => p.id == id);
        if (idx !== -1) { products[idx].price = parseInt(newPrice); saveProducts(products); alert('Harga berhasil diubah!'); }
    }
}

function editStock(id, stock) {
    let newStock = prompt('Edit stok produk:', stock);
    if (newStock && !isNaN(newStock) && parseInt(newStock) >= 0) {
        let products = getProducts();
        let idx = products.findIndex(p => p.id == id);
        if (idx !== -1) { products[idx].stock = parseInt(newStock); saveProducts(products); alert('Stok berhasil diubah!'); }
    }
}

function deleteProduct(id, name) {
    if (confirm(`Hapus produk "${name}"?`)) {
        let products = getProducts().filter(p => p.id != id);
        products.forEach((p, i) => p.id = i + 1);
        saveProducts(products);
        alert('Produk dihapus!');
    }
}

function addNewProduct() {
    document.getElementById('newProductName').value = '';
    document.getElementById('newProductPrice').value = '';
    document.getElementById('newProductStock').value = '0';
    document.getElementById('newProductPhoto').value = '';
    new bootstrap.Modal(document.getElementById('addProductModal')).show();
}

function saveNewProduct() {
    let name = document.getElementById('newProductName').value;
    let price = document.getElementById('newProductPrice').value;
    let stock = document.getElementById('newProductStock').value;
    let file = document.getElementById('newProductPhoto').files[0];
    
    if (!name) { alert('Nama produk harus diisi!'); return; }
    if (!price || isNaN(price) || parseInt(price) <= 0) { alert('Harga harus angka positif!'); return; }
    
    let products = getProducts();
    let newId = products.length > 0 ? Math.max(...products.map(p => p.id)) + 1 : 1;
    let newProduct = { id: newId, name: name, price: parseInt(price), stock: parseInt(stock) || 0, image: defaultImage };
    
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            newProduct.image = e.target.result;
            products.push(newProduct);
            saveProducts(products);
            bootstrap.Modal.getInstance(document.getElementById('addProductModal')).hide();
            alert('Produk ditambahkan!');
        };
        reader.readAsDataURL(file);
    } else {
        products.push(newProduct);
        saveProducts(products);
        bootstrap.Modal.getInstance(document.getElementById('addProductModal')).hide();
        alert('Produk ditambahkan!');
    }
}

function openPhotoModal(id) {
    let products = getProducts();
    let product = products.find(p => p.id == id);
    currentProductId = id;
    
    let img = document.getElementById('currentPhotoPreview');
    let noText = document.getElementById('noPhotoText');
    if (product.image && product.image !== defaultImage) {
        img.src = product.image;
        img.style.display = 'block';
        noText.style.display = 'none';
    } else {
        img.style.display = 'none';
        noText.style.display = 'block';
    }
    document.getElementById('photoFile').value = '';
    document.getElementById('newPreviewContainer').style.display = 'none';
    new bootstrap.Modal(document.getElementById('photoModal')).show();
}

document.getElementById('photoFile').addEventListener('change', function(e) {
    let file = e.target.files[0];
    if (file) {
        if (!file.type.match('image.*')) { alert('File harus gambar!'); this.value = ''; return; }
        if (file.size > 2 * 1024 * 1024) { alert('Maksimal 2MB!'); this.value = ''; return; }
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('newPhotoPreview').src = e.target.result;
            document.getElementById('newPreviewContainer').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

function uploadPhoto() {
    let file = document.getElementById('photoFile').files[0];
    if (!file) { alert('Pilih file foto!'); return; }
    
    let reader = new FileReader();
    reader.onload = function(e) {
        let products = getProducts();
        let idx = products.findIndex(p => p.id == currentProductId);
        if (idx !== -1) {
            products[idx].image = e.target.result;
            saveProducts(products);
            bootstrap.Modal.getInstance(document.getElementById('photoModal')).hide();
            alert('Foto berhasil diubah!');
        }
    };
    reader.readAsDataURL(file);
}

function deletePhoto() {
    if (confirm('Hapus foto? Akan kembali ke default.')) {
        let products = getProducts();
        let idx = products.findIndex(p => p.id == currentProductId);
        if (idx !== -1) {
            products[idx].image = defaultImage;
            saveProducts(products);
            bootstrap.Modal.getInstance(document.getElementById('photoModal')).hide();
            alert('Foto dihapus!');
        }
    }
}

function loadProducts() {
    let products = getProducts();
    let html = '';
    for (let p of products) {
        let imgSrc = (p.image && p.image !== defaultImage) ? p.image : defaultImage;
        let stockBadge = p.stock <= 0 ? '<span class="badge-stock badge-danger">Habis</span>' :
                         (p.stock <= 3 ? '<span class="badge-stock badge-warning">Terbatas</span>' :
                         '<span class="badge-stock badge-success">Tersedia</span>');
        
        html += `<tr>
            <td><img src="${imgSrc}" class="product-img" onclick="openPhotoModal(${p.id})" style="cursor:pointer"></td>
            <td>#${p.id}</td>
            <td><span class="edit-text" onclick="editName(${p.id}, '${p.name.replace(/'/g, "\\'")}')"><i class="fas fa-pen"></i> ${p.name}</span></td>
            <td><span class="edit-text" onclick="editPrice(${p.id}, ${p.price})"><i class="fas fa-pen"></i> Rp ${p.price.toLocaleString('id-ID')}</span></td>
            <td><span class="edit-text" onclick="editStock(${p.id}, ${p.stock})"><i class="fas fa-pen"></i> ${p.stock}</span><br>${stockBadge}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-edit dropdown-toggle" type="button" data-bs-toggle="dropdown">Edit</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="openPhotoModal(${p.id})"><i class="fas fa-image"></i> Ganti Foto</a></li>
                        <li><a class="dropdown-item" href="#" onclick="editPrice(${p.id}, ${p.price})"><i class="fas fa-tag"></i> Edit Harga</a></li>
                        <li><a class="dropdown-item" href="#" onclick="editStock(${p.id}, ${p.stock})"><i class="fas fa-boxes"></i> Edit Stok</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="deleteProduct(${p.id}, '${p.name.replace(/'/g, "\\'")}')"><i class="fas fa-trash"></i> Hapus Produk</a></li>
                    </ul>
                </div>
             </td>
        </tr>`;
    }
    document.getElementById('productsList').innerHTML = html;
}

// Cek login
const currentUser = localStorage.getItem('currentUser');
if (!currentUser) window.location.href = '/login';
else {
    let user = JSON.parse(currentUser);
    if (user.role !== 'admin') window.location.href = '/login';
}

loadProducts();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>