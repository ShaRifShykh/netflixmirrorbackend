<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('series_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("series_id");
            $table->unsignedBigInteger("genre_id");
            $table->timestamps();
        });

        Schema::table('series_genres', function (Blueprint $table) {
            $table->foreign('series_id')
                ->references('id')
                ->on('series')
                ->onDelete('cascade');

            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('series_genres');
    }
};
