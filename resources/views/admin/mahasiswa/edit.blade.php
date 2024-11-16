@extends('layouts.app')
@section('content')
  <div class="containter p-4">
    <div class="card">
      <div class="card-body">
        <div class="card">
          <div class="card-header">
            <p>Tambah Mahasiswa</p>
          </div>
          <div class="card-body">
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data" method="POST">
              @csrf
              @method('put')
              <div class="form-group mt-3">
                <label for="">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control">
                  <option value="">- pilih -</option>
                  <option value="TI" {{ $mahasiswa->jurusan == 'TI' ? 'selected' : '' }}>TI</option>
                  <option value="SI" {{ $mahasiswa->jurusan == 'SI' ? 'selected' : '' }}>SI</option>
                </select>
              </div>
              <div class="form-group mt-3">
                <label for="">NPM</label>
                <input type="text" name="npm" class="form-control" value="{{ $mahasiswa->npm }}">
              </div>
              <div class="form-group mt-3">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $mahasiswa->nama }}">
              </div>
              <div class="form-group mt-3">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="nama" class="form-control" value="{{ $mahasiswa->tanggal_lahir }}">
              </div>
              <div class="row mt-3 align-items-center">
                {{-- Mengubah Gambar Sebelum dan Sesudah --}}
                <!-- Kolom untuk Gambar Sebelumnya -->
                <div class="col-md-2 text-center">
                  <label for="" class="form-label">Gambar Sebelumnya</label>
                  <img src="{{ asset('storage/mahasiswa/' . $mahasiswa->foto) }}" alt="Foto Mahasiswa"
                    class="img-fluid img-thumbnail">
                </div>

                <!-- Kolom untuk Input Foto Baru -->
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="foto" class="form-label">Foto Baru</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                    <small class="text-muted d-block mt-1">Isi hanya jika ingin mengganti foto</small>
                  </div>
                </div>
              </div>

              <div class="float-en mt-3">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
