<?php

namespace Database\Seeders;

use App\Models\App;
use App\Models\Category;
use App\Models\Moto;
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
            'alamat'=> 'Jl. Random Kota Random',
            'phone'=> '0812-3765-0656',
            'email'=> 'anonymous@aaa.com',
            'link_fb'=> 'https://facebook.com',
            'link_instagram'=> 'https://instagram.com',
            'link_youtube'=> 'https://youtube.com',
            'link_map'=> 'https://goo.gl/maps/ZLHzbrqju2193FaJ7',
            'section_one'=> [
                'point_1'=>[
                    'title' => 'VISI',
                    'data'=> ['Terwujudnya rumah sakit yang berintegritas dalam pelayanan dan pendidikan']
                ],
                'point_2'=>[
                    'title' => 'MISI',
                    'data'=> [
                        'Mewujudkan mutu pelayanan kesehatan dan keselamatan pasien sesuai standar akreditasi',
                        'Menyelenggarakan pelatihan dan penelitian kesehatan yang bermutu untuk menunjang dan mengembangkan pelayanan rumah sakit, dan',
                        'Mewujudkan tata kelola rumah sakit yang profesional dan memiliki etika.'
                        ]
                ],
                'image'=>null
            ],
            'section_two'=> [
                [ 'name'=> 'PELAYANAN PASIEN', 'icon'=> 'verified', 'desc'=> 'Memberi pelayanan kesehatan paripurna berdasarkan Cinta Kasih.' ],
                [ 'name'=> 'AKSES INFORMASI', 'icon'=> 'local_library', 'desc'=> 'Kemudahan akses informasi dan data oleh pasien mengenai biaya yang transparan dan sejelas-jelasnya.' ],
                [ 'name'=> 'KEPUASAN PASIEN', 'icon'=> 'handshake', 'desc'=> 'Kami berkomitmen untuk memberikan kepuasan terhadap pasien.' ],
                [ 'name'=> 'KEMUDAHAN PENDAFTARAN', 'icon'=> 'app_registration', 'desc'=> 'Kami melayani pendaftaran melalui berbagai media mulai dari Booking melalui telepon, website,  whatsapp dan smartphone melalui Play Store : .' ]
            ],
            'themes' => [
                ['name'=>'primary', 'value'=>'#423a8e'],
                ['name'=>'secondary', 'value'=>'#06b8b8'],
                ['name'=>'negative', 'value'=>'#dc3545']
            ]
        ]);

        Category::create(['nama'=>'Warta RSUD']);
        Category::create(['nama'=>'Informasi']);

        // Moto::create([
        //     'name'=> 'PELAYANAN PASIEN',
        //     'icon'=> 'verified',
        //     'desc'=> 'Memberi pelayanan kesehatan paripurna berdasarkan Cinta Kasih.',
        // ]);
        // Moto::create([
        //     'name'=> 'AKSES INFORMASI',
        //     'icon'=> 'local_library',
        //     'desc'=> 'Kemudahan akses informasi dan data oleh pasien mengenai biaya yang transparan dan sejelas-jelasnya.',
        // ]);
        // Moto::create([
        //     'name'=> 'KEPUASAN PASIEN',
        //     'icon'=> 'handshake',
        //     'desc'=> 'Kemudahan akses informasi dan data oleh pasien mengenai biaya yang transparan dan sejelas-jelasnya.',
        // ]);
    }
}
