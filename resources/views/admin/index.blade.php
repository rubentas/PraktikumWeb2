@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <h3>Halo, Selamat datang, {{ Auth::user()->nama }}!</h3>
        <p>Anda telah berhasil login. Selamat bekerja dan semoga hari Anda menyenangkan!</p>
      </div>
    </div>
  </div>
@endsection
