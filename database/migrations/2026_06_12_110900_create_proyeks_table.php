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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('kode_proyek')->unique();
            $table->foreignId('customer_id')->constrained('customer')->onDelete('cascade');
            $table->string('nama_proyek');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi')->nullable();
            $table->decimal('nilai_kontrak', 15, 2)->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['Perencanaan', 'Berjalan', 'Selesai', 'Dibatalkan'])->default('Perencanaan');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyek');
    }
};