<?php

namespace Database\Seeders;

use App\Models\Lokasi;
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
        User::create([
            'name'  => 'Test User',
            'email' => 'emailadmin@gmail.com',
            'password' => bcrypt('12345'),
            'nomor_hp' => '081234567890'
        ]);

        // Tentang Kami default
        Tentang::updateOrCreate(
            ['id' => 1],
            [
                'web_title'    => 'Tentang Kami',
                'about_title'  => 'Tasty Food',

                'about_image_1' => 'eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg',
                'about_image_2' => 'sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
                'about_desc_1' => 'Kami adalah brand kuliner yang berkomitmen menyajikan makanan lezat dengan bahan berkualitas tinggi.',
                'about_desc_2' => 'Dengan dedikasi dan pengalaman, kami terus menghadirkan cita rasa terbaik untuk semua kalangan.',
                
                'visi_image_1' => 'fathul-abrar-T-qI_MI2EMA-unsplash.jpg',
                'visi_image_2' => 'michele-blackwell-rAyCBQTH7ws-unsplash.jpg',
                'visi_desc_1'  => 'Menjadi brand kuliner terpercaya dan pilihan utama masyarakat.',
                'visi_desc_2'  => 'Terus berinovasi dalam kualitas, rasa, dan pelayanan.',

                'misi_image' => 'sanket-shah-SVA7TyHxojY-unsplash.jpg',
                'misi_desc_1'  => 'Menyajikan makanan berkualitas dengan harga terjangkau.',
                'misi_desc_2'  => 'Mengutamakan kepuasan pelanggan dan pelayanan terbaik.',
            ]
        );

        // Lokasi default
        Lokasi::create([
            'nama_lokasi' => 'Cimindi, Bandung',
            'map_embed' => 'https://www.google.com/maps?q=Cimahi,+Jawa+Barat&output=embed'
        ]);
    }
}
