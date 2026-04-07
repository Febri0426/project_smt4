<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validasi Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Form Data Pegawai</h4>
            </div>
            <div class="card-body">
                
                {{-- ✅ Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- ✅ Validation Errors --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('formulir.proses') }}" method="POST">
                    @csrf
                    
                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap *</label>
                        <input type="text" 
                               name="nama" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               id="nama" 
                               value="{{ old('nama') }}"
                               placeholder="Masukkan nama lengkap">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Alamat --}}
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat *</label>
                        <textarea name="alamat" 
                                  class="form-control @error('alamat') is-invalid @enderror" 
                                  id="alamat" 
                                  rows="3"
                                  placeholder="Masukkan alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               value="{{ old('email') }}"
                               placeholder="contoh@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Umur --}}
                    <div class="mb-3">
                        <label for="umur" class="form-label">Umur</label>
                        <input type="number" 
                               name="umur" 
                               class="form-control @error('umur') is-invalid @enderror" 
                               id="umur" 
                               value="{{ old('umur') }}"
                               placeholder="Masukkan umur">
                        @error('umur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Data</button>
                    <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>