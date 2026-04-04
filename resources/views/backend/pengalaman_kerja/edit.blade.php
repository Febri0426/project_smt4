@extends('backend.layouts.template')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Edit Pengalaman Kerja</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengalaman_kerja.index') }}">Pengalaman Kerja</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <h4 class="card-title">Form Edit Data Pengalaman Kerja</h4>
                    
                    <form action="{{ route('pengalaman_kerja.update', $pengalaman_kerja->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama', $pengalaman_kerja->nama) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="{{ old('jabatan', $pengalaman_kerja->jabatan) }}" required>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Tahun Masuk</label>
                                <input type="number" class="form-control" name="tahun_masuk" value="{{ old('tahun_masuk', $pengalaman_kerja->tahun_masuk) }}" min="1900" max="2099" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tahun Keluar</label>
                                <input type="number" class="form-control" name="tahun_keluar" value="{{ old('tahun_keluar', $pengalaman_kerja->tahun_keluar) }}" min="1900" max="2099" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="mdi mdi-content-save"></i> Update Data
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