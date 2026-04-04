@extends('backend/layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Edit Pendidikan</header>
                    <div class="panel-body">
                        <div class="form">
                            <!-- Perhatikan route: pendidikan.update -->
                            {!! Form::model($pendidikan, ['method' => 'PATCH','route' => ['pendidikan.update', $pendidikan->id], 'class' => 'form-horizontal']) !!}
                                
                                <!-- Input Nama -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Nama Sekolah</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="nama" class="form-control" value="{{ old('nama', $pendidikan->nama) }}" required>
                                    </div>
                                </div>

                                <!-- Input Tingkat -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tingkat</label>
                                    <div class="col-lg-10">
                                        <select name="tingkat" class="form-control" required>
                                            <option value="SD/MI" {{ $pendidikan->tingkat == 'SD/MI' ? 'selected' : '' }}>SD/MI</option>
                                            <option value="SMP/MTs" {{ $pendidikan->tingkat == 'SMP/MTs' ? 'selected' : '' }}>SMP/MTs</option>
                                            <option value="SMA/MA" {{ $pendidikan->tingkat == 'SMA/MA' ? 'selected' : '' }}>SMA/MA</option>
                                            <option value="D1/D2/D3/D4" {{ $pendidikan->tingkat == 'D1/D2/D3/D4' ? 'selected' : '' }}>D1/D2/D3/D4</option>
                                            <option value="S1" {{ $pendidikan->tingkat == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ $pendidikan->tingkat == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ $pendidikan->tingkat == 'S3' ? 'selected' : '' }}>S3</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Input Tahun Masuk -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tahun Masuk</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="tahun_masuk" class="form-control" value="{{ old('tahun_masuk', $pendidikan->tahun_masuk) }}" required>
                                    </div>
                                </div>

                                <!-- Input Tahun Keluar -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Tahun Keluar</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="tahun_keluar" class="form-control" value="{{ old('tahun_keluar', $pendidikan->tahun_keluar) }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="{{ route('pendidikan.index') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>
@endsection