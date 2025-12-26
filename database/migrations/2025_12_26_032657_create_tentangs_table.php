<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tentangs', function (Blueprint $table) {
            $table->id();

            // Judul halaman
            $table->string('web_title');

            // Section Tentang
            $table->string('about_title');
            $table->text('about_desc_1');
            $table->text('about_desc_2');
            $table->string('about_image_1')->nullable();
            $table->string('about_image_2')->nullable();

            // Visi
            $table->text('visi_desc_1');
            $table->text('visi_desc_2');
            $table->string('visi_image_1')->nullable();
            $table->string('visi_image_2')->nullable();

            // Misi
            $table->text('misi_desc_1');
            $table->text('misi_desc_2');
            $table->string('misi_image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tentangs');
    }
};