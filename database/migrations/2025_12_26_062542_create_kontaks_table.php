<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();

            // data pengirim
            $table->string('subject');
            $table->string('name');
            $table->string('email');
            $table->text('message');

            // status baca admin (opsional)
            $table->boolean('is_read')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
