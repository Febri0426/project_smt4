{{-- Menghubungkan ke view master --}}
@extends('frontend.layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Home Page</h1>
        <p class="lead">This is the Home Page</p>

        <p>Nama : {{ $nama }}</p>

        <p>Mata Pelajaran</p>
        <ul>
            @foreach($pelajaran as $p)
                <li>{{ $p }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection