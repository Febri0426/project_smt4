<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-1 text-danger">404</h1>
            <h2>Halaman Tidak Ditemukan</h2>
            <p class="text-muted">Maaf, halaman yang Anda cari tidak ada.</p>
            <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>