<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BookSeeder::class,
            GenreSeeder::class,
        ]);
        // \App\Models\User::factory()->create();

        // \App\Models\User::factory()->create([
        //     'username' => 'admin',
        //     'password' => '$2a$10$VJ19U93eqQcSH1WF/NSxDur5dNpHZWSTT.5acHRF51609sZKJZmPG', //admin
        //     'user_number' => 777,
        //     'phone_number' => 62877,
        //     'address' => 'home',
        //     'role' => 'admin',
        // ]);
    }
}

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->state([
            'username' => 'admin',
            'password' => '$2a$10$VJ19U93eqQcSH1WF/NSxDur5dNpHZWSTT.5acHRF51609sZKJZmPG', //admin
            'user_number' => 777,
            'phone_number' => 62877,
            'address' => 'home',
            'role' => 'Pustakawan',
        ])->create();
        
        User::factory()->state([
            'username' => 'Zidane',
            'password' => '$2a$10$HIJYZAaUT8VGks3MDmuaYONKsQgbTr.nybta3I6fFzw5PfGNo6VG.', //member
            'user_number' => 111,
            'phone_number' => 628777,
            'address' => 'home',
            'role' => 'Member',
        ])->create();
    }
}

class BookSeeder extends Seeder
{
    public function run()
    {
        Book::factory()->count(15)->create();
    }
}

class GenreSeeder extends Seeder
{
    public function run()
    {
        Genre::factory()->count(7)->create();
    }
}