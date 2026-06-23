<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - ParselKu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px 0; }
        .navbar-brand, .nav-link { color: white !important; font-weight: 500; }
        .nav-link:hover { color: #ffd700 !important; }
        .contact-card { background: white; border-radius: 15px; padding: 30px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.08); height: 100%; }
        .contact-card i { font-size: 40px; color: #667eea; margin-bottom: 20px; }
        .footer { background: #2d3748; color: #cbd5e0; padding: 40px 0 20px; margin-top: 50px; text-align: center; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-gift"></i> ParselKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('order') }}">Pesan</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tracking') }}">Lacak</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <h2 class="text-center mb-4">Hubungi Kami</h2>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="contact-card">
                <i class="fas fa-map-marker-alt"></i>
                <h5>Alamat</h5>
                <p>Jl. Merdeka No. 123<br>Jakarta, Indonesia</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-card">
                <i class="fas fa-phone"></i>
                <h5>Telepon</h5>
                <p>+62 812 3456 7890<br>+62 21 1234 5678</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="contact-card">
                <i class="fas fa-envelope"></i>
                <h5>Email</h5>
                <p>cs@parselku.com<br>info@parselku.com</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-card">
                <i class="fab fa-whatsapp"></i>
                <h5>WhatsApp</h5>
                <p>+62 812 3456 7890<br>Chat kami untuk pertanyaan</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-card">
                <i class="fab fa-instagram"></i>
                <h5>Instagram</h5>
                <p>@parselku_official<br>Ikuti kami untuk promo</p>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        <p>&copy; 2025 ParselKu. Kirim kebahagiaan dengan mudah.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>