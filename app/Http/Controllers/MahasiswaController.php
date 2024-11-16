<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
// Halaman Mahasiswa
{
  public function index(Request $request)
  {
    // Simpan input pencarian agar tetap muncul di form setelah submit
    $request->flash();

    // Mulai query Mahasiswa
    $mahasiswa = Mahasiswa::query();

    // Cek apakah keyword ada dan filter data jika ada
    if (isset($request->keyword)) {
      $mahasiswa = $mahasiswa->where('nama', 'LIKE', "%{$request->keyword}%")
        ->orWhere('npm', 'LIKE', "%{$request->keyword}%");
    }

    // Ambil data mahasiswa
    $mahasiswa = $mahasiswa->get();

    // Return ke view
    return view('admin.mahasiswa.index', compact('mahasiswa'));
  }


  // Buat Data Mahsiswa
  public function create()
  {
    return view('admin.mahasiswa.create');
  }
  public function store(Request $request)
  {
    //proses upload file
    $input = $request->all();
    if ($request->foto) {
      $input['foto'] = $request->foto->getClientOriginalName();
      $request->file('foto')->move('storage/mahasiswa', $input['foto']);
    }
    //fungsi simpan data
    Mahasiswa::create($input);
    return redirect()->route('mahasiswa.index');
  }

  public function edit($id)
  {
    $mahasiswa = Mahasiswa::findOrFail($id);
    return view('admin.mahasiswa.edit', compact('mahasiswa'));
  }
  public function update(Request $request, $id)
  {
    $mahasiswa = Mahasiswa::findOrFail($id);
    $input     = $request->all();
    //Proses upload file 
    if ($request->foto) {
      $input['foto'] = $request->foto->getClientOriginalName();
      $request->file('foto')->move('storage/mahasiswa', $input['foto']);
    }

    // Prosess update data
    $mahasiswa->update($input);
    return redirect()->route('mahasiswa.index');
  }

  public function delete($id)
  {
    $mahasiswa = Mahasiswa::find($id);
    $mahasiswa->delete();
    return redirect()->route('mahasiswa.index');
  }

  public function print()
  {
    // Retrieve all mahasiswa records
    $mahasiswa = Mahasiswa::all();

    // Return the view and pass the $mahasiswa variable
    return view('admin.mahasiswa.print', compact('mahasiswa'));
  }
}