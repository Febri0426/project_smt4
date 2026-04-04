@extends('backend/layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li class="fa-home"><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><a href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
                    <li class="active">Tambah</li>
                </ol>
            </div>
        </div>

        <!-- Form Validations -->
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Pendidikan
                </header>
                <div class="panel-body">
                    <div class="form">
                        <!-- Form Open -->
                        {!! Form::open(['route' => 'pendidikan.store', 'class' => 'cmxform form-horizontal', 'id' => 'pendidikan_form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                        <!-- Input Nama -->
                        <div class="form-group">
                            <label for="nama" class="control-label col-lg-2">Nama Sekolah <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input class="form-control" id="nama" name="nama" minlength="2" type="text" required />
                            </div>
                        </div>

                        <!-- Input Tingkat -->
                        <div class="form-group">
                            <label for="tingkat" class="control-label col-lg-2">Tingkat <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <select class="form-control m-bot15" name="tingkat" id="tingkat" required>
                                    <option value="SD/MI">SD/MI</option>
                                    <option value="SMP/MTs">SMP/MTs</option>
                                    <option value="SMA/MA">SMA/MA</option>
                                    <option value="D1/D2/D3/D4">D1/D2/D3/D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                        </div>

                        <!-- Input Tahun Masuk -->
                        <div class="form-group">
                            <label for="tahun_masuk" class="control-label col-lg-2">Tahun Masuk <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control datapicker" required />
                            </div>
                        </div>

                        <!-- Input Tahun Keluar -->
                        <div class="form-group">
                            <label for="tahun_keluar" class="control-label col-lg-2">Tahun Selesai <span class="required">*</span></label>
                            <div class="col-lg-10">
                                <input id="tahun_keluar" type="text" name="tahun_keluar" class="form-control datapicker" required />
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a href="{{ route('pendidikan.index') }}" class="btn btn-default" type="button">Cancel</a>
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>
    </section>
</section>
@endsection

<!-- Script Datepicker -->
<link href="{{ asset('backend/css/bootstrap-datepicker.css') }}" rel="stylesheet">

@section('content-js')
<script src="{{ asset('backend/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript">
    $(function() {
        $('.datapicker').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
        $('.datapicker2').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
    });
</script>
@endsection