<h2>Nama : Siti Nurlela</h2>
<h2>Nim : 101230065</h2>
<h2>Kelas : TF23A</h2>

---

# ParselKu — Aplikasi Pemesanan Parsel Online

**ParselKu** adalah aplikasi web berbasis **Laravel 9** untuk pemesanan parsel/hampers secara online. Aplikasi ini dikembangkan sebagai project pembelajaran dengan arsitektur hybrid — Laravel sebagai backend yang melayani Blade views, sementara seluruh logika bisnis berjalan secara client-side menggunakan **localStorage**.

---

## Fitur Utama

### 🏠 Halaman Publik
| Halaman | Deskripsi |
|---------|-----------|
| **Beranda** (`/`) | Hero section, fitur unggulan, statistik, preview produk |
| **Produk** (`/produk`) | Katalog 6 jenis parsel (Lebaran, Ultah, Sehat, Valentine, Pernikahan, Baby Gift) dengan indikator stok real-time |
| **Pesan** (`/pesan`) | Form pemesanan dengan pilihan produk, data pelanggan, kartu ucapan (live preview), dan metode pembayaran (Transfer Bank / QRIS / COD) |
| **Lacak** (`/lacak`) | Tracking pesanan berdasarkan nomor order, timeline status otomatis, dan rating bintang |
| **Kontak** (`/kontak`) | Informasi kontak, alamat, WhatsApp, Instagram |

### 🔐 Autentikasi (Client-Side via localStorage)
- **Login** (`/login`) — Demo: `admin/admin123`, `user/user123`
- **Register** (`/register`) — Pendaftaran pengguna baru
- Role-based access: **Admin** dan **User**

### 👑 Admin Panel
| Halaman | Deskripsi |
|---------|-----------|
| **Dashboard** (`/admin/dashboard`) | Kartu statistik, grafik pendapatan (Chart.js 7 hari), tabel pesanan terbaru |
| **Pesanan** (`/admin/orders`) | Manajemen pesanan dengan update status inline (pending → processing → shipped → delivered), filter, dan detail modal |
| **Produk** (`/admin/products`) | CRUD produk (tambah/edit/hapus), upload foto via FileReader |

### 👤 User Dashboard
- **Dashboard** (`/user/dashboard`) — Daftar pesanan user dengan status dan rating
- **Riwayat** (`/user/orders`) — Riwayat pemesanan user

---

## Tech Stack

| Teknologi | Kegunaan |
|-----------|----------|
| **Laravel 9** | Framework backend — routing, Blade templating |
| **PHP 8.0+** | Bahasa pemrograman backend |
| **Bootstrap 5.3** | CSS framework untuk UI responsif |
| **Font Awesome 6** | Ikon |
| **Chart.js** | Grafik pendapatan di admin dashboard |
| **localStorage** | Penyimpanan data client-side (auth, produk, pesanan) |

---

## Cara Menjalankan

```bash
# Clone repositori
git clone https://github.com/Shielakaa664/belajar-laravel.git
cd belajar-laravel

# Install dependencies
composer install

# Copy environment
cp .env.example .env
php artisan key:generate

# Jalankan development server
php artisan serve
```

Akses di `http://localhost:8000`

---

## Testing

```bash
vendor/bin/phpunit
```

---

## Struktur Direktori Utama

```
app/
├── Http/
│   └── Controllers/     → AuthController, ProductController, OrderController, dll.
├── Models/               → User model
resources/
└── views/
    ├── admin/            → Dashboard, orders, products (admin panel)
    ├── user/             → Dashboard, orders (user panel)
    ├── auth/             → Login, register
    ├── partials/         → Navbar
    ├── home.blade.php    → Beranda
    ├── products.blade.php → Katalog produk
    ├── order.blade.php   → Form pemesanan
    ├── tracking.blade.php → Lacak pesanan
    └── contact.blade.php → Kontak
routes/
├── web.php              → Route publik, auth, admin, user
└── api.php              → Route API (default Sanctum)
```

---

**Dosen Pengampu:** —  
**Mata Kuliah:** Pemrograman Web / Framework  
**Tahun Akademik:** 2024/2025

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
