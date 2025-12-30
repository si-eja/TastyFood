<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();

            // PENANDA KONTEN
            $table->enum('section', ['banner', 'slider', 'thumbnail']);

            // KHUSUS BANNER
            $table->string('title')->nullable();

            // GAMBAR
            $table->string('image');
            $table->string('caption')->nullable();

            // URUTAN & STATUS
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
