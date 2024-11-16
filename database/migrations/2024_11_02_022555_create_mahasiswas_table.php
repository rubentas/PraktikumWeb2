<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('jurusan');
            $table->integer('npm')->length(10);
            $table->string('nama'); // Tambahkan tanda titik koma di akhir baris
            $table->date('tanggal_lahir'); // Tambahkan tanda titik koma di akhir baris
            $table->text('foto'); // Tambahkan tanda titik koma di akhir baris
            $table->timestamps(); // Biasanya ini digunakan untuk kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};