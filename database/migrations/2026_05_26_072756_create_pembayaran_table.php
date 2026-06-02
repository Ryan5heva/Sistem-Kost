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
    Schema::create('pembayaran', function (Blueprint $table) {
        $table->id();
        $table->foreignId('penghuni_id')->constrained('penghuni')->onDelete('cascade');
        $table->integer('bulan');
        $table->integer('tahun');
        $table->decimal('jumlah', 10, 2);
        $table->enum('status', ['belum_bayar', 'sudah_bayar'])->default('belum_bayar');
        $table->date('tanggal_bayar')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
