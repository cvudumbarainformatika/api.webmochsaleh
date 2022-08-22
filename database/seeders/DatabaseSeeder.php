<?php

namespace Database\Seeders;

use App\Models\App;
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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'=> 'Administrator',
            'email'=> 'admin@app.com',
            'password'=> bcrypt('password'),
        ]);
        App::create([
            'nama'=> 'Aplikasi',
            'title'=> 'Title Website',
            'desc'=> 'Deskripsi Website',
            'alamat'=> 'Jl. Letjend Sutoyo Gg.Taurus Kota Probolinggo',
            'phone'=> '0812-3765-0656',
            'link_fb'=> 'https://facebook.com',
            'link_instagram'=> 'https://instagram.com',
            'link_youtube'=> 'https://youtube.com',
        ]);
    }
}
