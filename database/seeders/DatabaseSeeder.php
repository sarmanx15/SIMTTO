<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Catkamar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'      => 'ADMIN PDE',
            'email'     => 'admin@rsudaws.co.id',
            // 'kamar_id'  => '0',
            'username'  => 'adminpde',
            'password'  => bcrypt('12345678'),
            'admin'     => '1'
        ]);
        User::create([
            'name'      => 'PETUGAS',
            'email'     => 'petugas@rsudaws.co.id',
            // 'kamar_id' => '0',
            'username'  => 'adminkamar',
            'password'  => bcrypt('12345678'),
            'admin'     => '0'
        ]);
        
    }
}
