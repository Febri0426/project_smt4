<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Upload & Resize Gambar (200x200)</h3>
                    </div>
                    <div class="card-body">
                        <!-- Alert untuk error/success -->
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Form Upload + Resize -->
                        <form action="{{ route('upload.resize') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Pilih File Gambar</label>
                                <input type="file" name="file" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" name="upload" class="btn btn-success">Upload & Resize (200x200)</button>
                            <a href="{{ route('upload') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>