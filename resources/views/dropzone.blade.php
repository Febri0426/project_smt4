<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dropzone Image Upload in Laravel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
        .dropzone .dz-message {
            font-weight: 400;
        }
        .dropzone .dz-message .note {
            font-size: 0.8em;
            font-weight: 200;
            display: block;
            margin-top: 1.4rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Dropzone Image Upload in Laravel</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('dropzone.store') }}" 
                              method="post" 
                              enctype="multipart/form-data" 
                              id="image-upload" 
                              class="dropzone">
                            @csrf
                            <div>
                                <h3>Upload Multiple Image By Click On Box</h3>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.min.js"></script>
    
    <script>
        Dropzone.autoDiscover = false;
        
        var dropzone = new Dropzone('#image-upload', {
            url: "{{ route('dropzone.store') }}",
            maxFilesize: 2,
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) {
                console.log(file);
            },
            init: function() {
                this.on('success', function(file, response) {
                    console.log('File uploaded successfully');
                });
                this.on('error', function(file, response) {
                    console.log('Error occurred');
                });
            },
        });
    </script>
</body>
</html>