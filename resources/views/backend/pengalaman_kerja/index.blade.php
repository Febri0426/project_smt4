@extends('backend.layouts.template')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Pengalaman Kerja</h4>
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
                    <h4 class="card-title">Data Pengalaman Kerja</h4>
                    
                    <!-- Tombol Tambah Data -->
                    <a href="{{ route('pengalaman_kerja.create') }}" class="btn btn-success mb-3">
                        <i class="mdi mdi-plus"></i> Tambah Data
                    </a>

                    <!-- Pesan Sukses -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="table-responsive m-t-40">
                        <!-- Tabel dengan ID zero_config agar nanti bisa di-datatables -->
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Jabatan</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ✅ DATA DARI DATABASE -->
                                @foreach($pengalaman_kerja as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->jabatan }}</td>
                                    <td>{{ $row->tahun_masuk }}</td>
                                    <td>{{ $row->tahun_keluar }}</td>
                                    <td class="text-center">
                                        
                                        <!-- 🔵 Tombol Detail (BARU) -->
                                        <a href="{{ route('pengalaman_kerja.show', $row->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                        
                                        <!-- 🟡 Tombol Edit -->
                                        <a href="{{ route('pengalaman_kerja.edit', $row->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        
                                        <!-- 🔴 Tombol Delete -->
                                        <form action="{{ route('pengalaman_kerja.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                <!-- ✅ AKHIR FOREACH -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Script untuk mengaktifkan DataTables pada tabel ini -->
<script>
    $(document).ready(function() {
        $('#zero_config').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            }
        });
    });
</script>