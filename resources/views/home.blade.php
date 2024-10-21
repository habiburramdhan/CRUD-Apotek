@extends('layout.template')

@section('content')
    <div class="jumbotron py-4 px-5">
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif

        @if (Session::get('login'))
        <div class="alert alert-warning">{{ Session::get('login') }}</div>
    @endif
        <h1 class="display-4">
            Selamat Datang {{ Auth::user()->name }}!
        </h1>
        <hr class="my-4">
        <p>Aplikasi ini digunakan hanya oleh pegawai administrator APOTEK. Digunakan untuk mengelola data obat, penyetokan, juga pembelian (kasir).</p>
        10
    </div>
@endsection