<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    User::create([
      'nama' => 'Admin Utama',
      'username' => 'admin123',
      'password' => Hash::make('12345678') // Hashing the password
    ]);
  }
}