<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();

            // judul halaman (hero)
            $table->string('page_title')->default('Galeri Kami');

            // gambar
            $table->string('image');        // path gambar
            $table->string('caption')->nullable();

            // tipe tampilan
            $table->enum('type', ['slider', 'thumbnail'])->default('thumbnail');

            // urutan tampil
            $table->integer('order')->default(0);

            // status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
