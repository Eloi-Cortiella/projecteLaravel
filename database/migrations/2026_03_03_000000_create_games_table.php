<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            // 5 camps (tipus diferents)
            $table->string('title');
            $table->string('platform');
            $table->integer('release_year');
            $table->decimal('price', 6, 2);
            $table->boolean('is_multiplayer')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};