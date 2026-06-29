# AGENTS.md — Panduan untuk AI Model

Dokumen ini berisi aturan yang **wajib dipatuhi semua AI model** dalam pengembangan dan pemeliharaan aplikasi ini.

---

## Workflow Wajib

### 1. Local Dev → Local Test

Setelah melakukan perubahan kode (fitur baru, perbaikan bug, refaktor), **WAJIB** menjalankan test lokal terlebih dahulu:

```bash
vendor/bin/phpunit
```

atau via Artisan:

```bash
php artisan test
```

Pastikan **semua test lolos** sebelum melanjutkan ke langkah berikutnya.

### 2. Local Test Lolos → Commit & Push

Jika semua test lokal lolos:

```bash
git add .
git commit -m "deskripsi perubahan yang jelas"
git push
```

**Aturan:**
- Jangan commit sebelum test lokal lolos
- Pesan commit harus deskriptif (mengikuti konvensi: `feat:`, `fix:`, `refactor:`, `docs:`, dll)
- Jangan `git push --force` ke branch utama (`main`/`master`)

### 3. Push → GitHub Auto Test (CI)

Setiap push akan otomatis menjalankan test melalui **GitHub Actions** (lihat `.github/workflows/tests.yml`).

Pantau hasil test di tab **Actions** repository GitHub.

### 4. CI Test Gagal → Analisa → Fix → Ulang

Jika test di CI gagal:

1. Buka log detail kegagalan di GitHub Actions
2. Analisa penyebab kegagalan (baca error message dengan teliti)
3. Perbaiki kode di environment lokal
4. Jalankan test lokal lagi: `vendor/bin/phpunit`
5. Jika lolos, commit & push lagi
6. Ulangi sampai semua test di CI lolos

---

## Aturan Tambahan

| Aturan | Keterangan |
|--------|-----------|
| **Lint/CS Fixer** | Pastikan kode mengikuti standar PSR-12 Laravel. Jika ada `.styleci.yml`, patuhi aturannya. |
| **Jangan ubah AGENT.py** | File ini adalah Python script untuk agent pipeline, bukan untuk diedit dalam konteks Laravel. |
| **Database Test** | Jika test membutuhkan database, gunakan SQLite in-memory (`DB_CONNECTION=sqlite DB_DATABASE=:memory:`). |
| **Keamanan** | Jangan pernah commit `.env`, key, atau credential apapun ke repository. |
| **Branch** | Kerja di branch fitur sendiri, baru merge ke `main` setelah review dan test lolos. |

---

## Perintah Penting

| Perintah | Fungsi |
|----------|--------|
| `vendor/bin/phpunit` | Jalankan semua test |
| `vendor/bin/phpunit --filter NamaTest` | Jalankan test spesifik |
| `php artisan make:test NamaTest` | Buat test baru |
| `php artisan make:test NamaTest --unit` | Buat unit test baru |

---

Dokumen ini wajib dibaca dan dipatuhi oleh semua AI model sebelum mengerjakan task apapun di repository ini.
