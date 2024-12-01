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
        Schema::create('history_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_show')->constrained('shows')->onDelete('cascade');
            $table->foreignId('id_tiket')->constrained('tickets')->onDelete('cascade');
            $table->foreignId('id_transaksi')->constrained('transaksis')->onDelete('cascade');
            $table->foreignId('id_review')->constrained('reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_users');
    }
};
