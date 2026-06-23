<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Parsel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 text-center">Daftar Menu Parsel</h2>
        <div class="row">
            @foreach($parsels as $p)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5>{{ $p['nama'] }}</h5>
                        <p class="text-primary fw-bold">Rp {{ number_format($p['harga'], 0, ',', '.') }}</p>
                        <form action="{{ url('/pesan-sekarang') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nama_parsel" value="{{ $p['nama'] }}">
                            <input type="text" name="pembeli" class="form-control mb-2" placeholder="Nama Pemesan" required>
                            <button type="submit" class="btn btn-success w-100">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>