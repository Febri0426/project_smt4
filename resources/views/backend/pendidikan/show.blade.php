@extends('backend/layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
                    <li class="active">Detail</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Detail Pendidikan</header>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th width="200">Nama Sekolah</th>
                                <td>: {{ $pendidikan->nama }}</td>
                            </tr>
                            <tr>
                                <th>Tingkat</th>
                                <td>: {{ $pendidikan->tingkat }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Masuk</th>
                                <td>: {{ $pendidikan->tahun_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Tahun Keluar</th>
                                <td>: {{ $pendidikan->tahun_keluar }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('pendidikan.index') }}" class="btn btn-default">Kembali</a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection