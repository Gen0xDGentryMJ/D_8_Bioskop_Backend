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
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->date('show_date');
            $table->foreignId('id_bioskop')->constrained('bioskops')->onDelete('cascade');
            $table->foreignId('id_movie')->constrained('movies')->onDelete('cascade');
            $table->foreignId('id_studio')->constrained('studios')->onDelete('cascade');
            $table->integer('harga');
            $table->integer('sisa_kursi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
