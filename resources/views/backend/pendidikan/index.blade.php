@extends('backend/layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('dashboard') }}">Home</a></li>
                    <li class="active">Pendidikan</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Pendidikan
                    </header>
                    <div class="panel-body">
                        
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <a href="{{ route('pendidikan.create') }}" class="btn btn-success mb-3">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Sekolah</th>
                                    <th>Tingkat</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Keluar</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($pendidikans as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->tahun_keluar }}</td>
                                    <td>
                                        <!-- Tombol Lihat -->
                                        <a href="{{ route('pendidikan.show', $item->id) }}" class="btn btn-sm btn-info" title="Lihat">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('pendidikan.edit', $item->id) }}" class="btn btn-sm btn-warning mx-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('pendidikan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection