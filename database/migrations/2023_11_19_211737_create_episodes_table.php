<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("series_id");
            $table->string("title");
            $table->longText("description")->nullable();
            $table->integer("season_number")->nullable();
            $table->integer("episode_number")->nullable();
            $table->integer("duration_minutes")->nullable();
            $table->date("release_date")->nullable();
            $table->string("thumbnail_url")->nullable();
            $table->string("url")->nullable();
            $table->timestamps();
        });

        Schema::table('episodes', function (Blueprint $table) {
            $table->foreign('series_id')
                ->references('id')
                ->on('series')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
