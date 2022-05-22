<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kamar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'roles' => 'Admin'
        ]);
        User::create([
            'name' => 'Pasien1',
            'email' => 'pasien@gmail.com',
            'password' => bcrypt('12345678'),
            'roles' => 'Pasien'
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 1 Merak',
            'kelas_perawatan' => 'vvip',
            'total_kamar' => '5',
            'sisa_kamar' => '5',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 1 Merak',
            'kelas_perawatan' => 'vip',
            'total_kamar' => '3',
            'sisa_kamar' => '3',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 1 Merak',
            'kelas_perawatan' => 'kelas1_anak',
            'total_kamar' => '10',
            'sisa_kamar' => '10',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 1 Merak',
            'kelas_perawatan' => 'kelas1_dewasa',
            'total_kamar' => '7',
            'sisa_kamar' => '7',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 2 Merpati',
            'kelas_perawatan' => 'kelas1_anak',
            'total_kamar' => '12',
            'sisa_kamar' => '12',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 2 Merpati',
            'kelas_perawatan' => 'kelas1_dewasa',
            'total_kamar' => '7',
            'sisa_kamar' => '7',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 2 Merpati',
            'kelas_perawatan' => 'kelas2_anak',
            'total_kamar' => '8',
            'sisa_kamar' => '8',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 2 Merpati',
            'kelas_perawatan' => 'kelas2_dewasa',
            'total_kamar' => '5',
            'sisa_kamar' => '5',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 3 Nuri',
            'kelas_perawatan' => 'kelas2_anak',
            'total_kamar' => '9',
            'sisa_kamar' => '9',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 3 Nuri',
            'kelas_perawatan' => 'kelas2_dewasa',
            'total_kamar' => '5',
            'sisa_kamar' => '5',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 3 Nuri',
            'kelas_perawatan' => 'kelas3_anak',
            'total_kamar' => '6',
            'sisa_kamar' => '6',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 3 Nuri',
            'kelas_perawatan' => 'kelas3_dewasa',
            'total_kamar' => '4',
            'sisa_kamar' => '4',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 4 Kutilang',
            'kelas_perawatan' => 'kelas3_anak',
            'total_kamar' => '6',
            'sisa_kamar' => '6',
        ]);
        Kamar::create([
            'nama_ruang' => 'Ruang 4 Kutilang',
            'kelas_perawatan' => 'kelas3_dewasa',
            'total_kamar' => '3',
            'sisa_kamar' => '3',
        ]);
    }
}
