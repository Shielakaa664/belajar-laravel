<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Parsel - lala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; padding-top: 30px; }
        .gallery-title { color: #ff2d20; font-weight: bold; margin-bottom: 30px; text-align: center; }
        .card-img-top { height: 200px; object-fit: cover; } /* Supaya ukuran foto seragam */
        .card { transition: 0.3s; border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .card:hover { transform: translateY(-10px); }
    </style>
</head>
<body>

<div class="container">
    <h2 class="gallery-title">📸 Koleksi Parsel lala</h2>
    
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1549465220-1a8b9238cd48?q=80&w=500" class="card-img-top" alt="Parsel 1">
                <div class="card-body text-center">
                    <h5 class="card-title">Paket Lebaran A</h5>
                    <p class="text-muted">Rp 250.000</p>
                    <a href="/keranjang" class="btn btn-outline-danger btn-sm">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1513201099705-a9746e1e201f?q=80&w=500" class="card-img-top" alt="Parsel 2">
                <div class="card-body text-center">
                    <h5 class="card-title">Hampers Premium</h5>
                    <p class="text-muted">Rp 500.000</p>
                    <a href="/keranjang" class="btn btn-outline-danger btn-sm">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="https://images.unsplash.com/photo-1512909006721-3d6018887383?q=80&w=500" class="card-img-top" alt="Parsel 3">
                <div class="card-body text-center">
                    <h5 class="card-title">Parsel Buah Segar</h5>
                    <p class="text-muted">Rp 150.000</p>
                    <a href="/keranjang" class="btn btn-outline-danger btn-sm">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="/" class="btn btn-secondary">Kembali ke Home</a>
    </div>
</div>

</body>
</html>