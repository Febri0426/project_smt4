<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Profile Page</h1>
    <p>{{ $message }}</p>
    
    @if(session('error'))
        <div style="color: red; margin-top: 20px;">
            {{ session('error') }}
        </div>
    @endif
    
    <div style="margin-top: 30px;">
        <h3>Test Middleware:</h3>
        <ul>
            <li><a href="/profile?age=150">Akses dengan age=150 (Akan Redirect)</a></li>
            <li><a href="/profile?age=250">Akses dengan age=250 (Berhasil)</a></li>
        </ul>
    </div>
</body>
</html>