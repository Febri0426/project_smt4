@extends('backend.layouts.template')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tambah Pengalaman Kerja</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengalaman Kerja</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Input Data</h4>
                    
                    <!-- Form mengarah ke route 'pengalaman_kerja.store' dengan method POST -->
                    <form action="{{ route('pengalaman_kerja.store') }}" method="POST">
                        @csrf <!-- WAJIB ADA untuk keamanan Laravel -->
                        
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama perusahaan" required>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" placeholder="Masukkan jabatan" required>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tahun Masuk</label>
                                <input type="number" class="form-control" name="tahun_masuk" placeholder="Contoh: 2020" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tahun Keluar</label>
                                <input type="number" class="form-control" name="tahun_keluar" placeholder="Contoh: 2023" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="mdi mdi-content-save"></i> Simpan
                        </button>
                        <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-danger">
                            <i class="mdi mdi-arrow-left"></i> Kembali
                        </a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection