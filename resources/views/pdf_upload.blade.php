<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dropzone PDF Upload</title>
    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <style>
        body { padding: 20px; font-family: Arial, sans-serif; }
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
            min-height: 200px;
            cursor: pointer;
        }
        .upload-button {
            margin-top: 20px;
            padding: 10px 30px;
            background: #0087F7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .upload-button:hover {
            background: #0067c4;
        }
        .upload-button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto;">
        <h2>Dropzone PDF Upload in Laravel</h2>
        
        <!-- Form dengan class dropzone -->
        <form action="{{ route('pdf.store') }}" 
              class="dropzone" 
              id="pdf-dropzone">
            @csrf
            <div class="dz-message">
                <h3>📁 Klik atau Drag PDF file ke sini</h3>
            </div>
        </form>

        <!-- Tombol Upload -->
        <button type="button" class="upload-button" id="submit-all">
            📤 Upload Files
        </button>
    </div>

    <script src="{{ asset('js/dropzone.js') }}"></script>
    <script>
        // Disable auto discover
        Dropzone.autoDiscover = false;

        // Inisialisasi Dropzone
        var myDropzone = new Dropzone("#pdf-dropzone", {
            url: "{{ route('pdf.store') }}",
            maxFilesize: 5,
            acceptedFiles: '.pdf',
            autoProcessQueue: false, // ← PENTING: Jangan auto upload
            addRemoveLinks: true,
            init: function() {
                var submitButton = document.querySelector("#submit-all");
                var myDropzone = this;

                // Event saat tombol upload diklik
                submitButton.addEventListener("click", function() {
                    myDropzone.processQueue(); // Upload semua file
                });

                // Saat upload sukses
                this.on('success', function(file, response) {
                    console.log('✅ Upload berhasil:', response);
                    alert('File PDF berhasil diupload!');
                });

                // Saat upload error
                this.on('error', function(file, error) {
                    console.log('❌ Upload error:', error);
                    alert('Upload gagal: ' + error);
                });

                // Saat file ditambahkan
                this.on('addedfile', function(file) {
                    console.log('File ditambahkan:', file.name);
                });

                // Saat semua file selesai diproses
                this.on('queuecomplete', function() {
                    console.log('Semua file selesai diupload');
                });
            }
        });
    </script>
</body>
</html>