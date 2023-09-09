<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // create role
        Role::create([
            'id' => 1,
            'name' => 'Admin',
            'description' => 'Administrator Role',
        ]);
        Role::create([
            'id' => 2,
            'name' => 'Client',
            'description' => 'Administrator Role',
        ]);

        // create user
        User::factory()->create([
            'name' => 'bagus',
            'email' => 'bagus@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);
        User::factory()->create([
            'name' => 'bayu',
            'email' => 'bayu@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 2
        ]);

        // create data book
        Book::create([
            'name' => 'Buku Matematika',
            'description' => 'Tentang belajar matematika dasar',
            'book_code' => '12/01/2001/mtk/01'
        ]);
        Book::create([
            'name' => 'Buku Bahasa Indonesia',
            'description' => 'Tentang belajar Bahasa Indonesia dasar',
            'book_code' => '12/01/2001/ind/01'
        ]);
        Book::create([
            'name' => 'Buku Ilmu Pengetahuan Alam',
            'description' => 'Tentang belajar IPA dasar',
            'book_code' => '12/01/2001/ipa/01'
        ]);
        Book::create([
            'name' => 'Buku Ilmu Pengetahuan Sosial',
            'description' => 'Tentang belajar IPS dasar',
            'book_code' => '12/01/2001/ips/01'
        ]);
    }
}
