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
        Schema::create('lahans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('nama_petani');
            $table->string('luas_lahan');
            $table->foreignId('distrik_id')->constrained()->cascadeOnDelete();
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('thumbnail');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lahans');
    }
};
