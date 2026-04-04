@extends('backend.layouts.template')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Detail Pengalaman Kerja</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengalaman_kerja.index') }}">Pengalaman Kerja</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Informasi Pengalaman Kerja</h4>
                        <a href="{{ route('pengalaman_kerja.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">ID</th>
                                <td>{{ $pengalaman_kerja->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Perusahaan</th>
                                <td>{{ $pengalaman_kerja->nama }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>{{ $pengalaman_kerja->jabatan }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Masuk</th>
                                <td>{{ $pengalaman_kerja->tahun_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Keluar</th>
                                <td>{{ $pengalaman_kerja->tahun_keluar }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <!-- ✅ PERBAIKAN: Gunakan date() bukan format() -->
                                <td>{{ date('d F Y, H:i:s', strtotime($pengalaman_kerja->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui Pada</th>
                                <!-- ✅ PERBAIKAN: Gunakan date() bukan format() -->
                                <td>{{ date('d F Y, H:i:s', strtotime($pengalaman_kerja->updated_at)) }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('pengalaman_kerja.edit', $pengalaman_kerja->id) }}" class="btn btn-warning">
                            <i class="mdi mdi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('pengalaman_kerja.destroy', $pengalaman_kerja->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="mdi mdi-delete"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection