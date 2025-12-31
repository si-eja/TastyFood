<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tentang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User default
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Tentang Kami default
        Tentang::updateOrCreate(
            ['id' => 1],
            [
                'web_title'    => 'Tentang Kami',
                'about_title'  => 'Tasty Food',

                'about_desc_1' => 'Kami adalah brand kuliner yang berkomitmen menyajikan makanan lezat dengan bahan berkualitas tinggi.',
                'about_desc_2' => 'Dengan dedikasi dan pengalaman, kami terus menghadirkan cita rasa terbaik untuk semua kalangan.',

                'visi_desc_1'  => 'Menjadi brand kuliner terpercaya dan pilihan utama masyarakat.',
                'visi_desc_2'  => 'Terus berinovasi dalam kualitas, rasa, dan pelayanan.',

                'misi_desc_1'  => 'Menyajikan makanan berkualitas dengan harga terjangkau.',
                'misi_desc_2'  => 'Mengutamakan kepuasan pelanggan dan pelayanan terbaik.',
            ]
        );
    }
}
