<!DOCTYPE html>
<html>
<head>
    <title>Drag & Drop Upload</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 200px;
            padding: 20px;
        }
        .dropzone .dz-message {
            font-weight: bold;
            color: #666;
            margin: 2em 0;
        }
        #preview {
            margin-top: 20px;
            text-align: center;
        }
        #preview img {
            max-width: 200px;
            border: 1px solid #ddd;
            padding: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5" style="max-width: 700px;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📁 Upload Gambar (Drag & Drop)</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/dropzone/store') }}" class="dropzone" id="myDropzone">
                @csrf
            </form>
            
            <div id="preview"></div>
            
            <br>
            <a href="{{ url('/upload') }}" class="btn btn-secondary">← Kembali ke Form Biasa</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js"></script>
<script>
    Dropzone.options.myDropzone = {
        paramName: "file",
        maxFilesize: 5,
        acceptedFiles: "image/*",
        dictDefaultMessage: "🖼️ Klik atau Tarik Gambar ke Sini",
        
        // Tambahkan CSRF token
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        
        init: function() {
            this.on("success", function(file, response) {
                console.log("Success:", response);
                
                // Tampilkan preview gambar yang sudah diupload
                var preview = document.getElementById('preview');
                preview.innerHTML = '<p class="text-success">✅ ' + response.message + '</p>' +
                                   '<img src="/img/dropzone/' + response.name + '" alt="Preview">';
            });
            
            this.on("error", function(file, response) {
                console.log("Error:", response);
                var message = (response.message) ? response.message : "Upload gagal!";
                alert("❌ " + message);
            });
        }
    };
</script>

</body>
</html>