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
    Schema::create('kamar', function (Blueprint $table) {
        $table->id();
        $table->string('nomor_kamar');
        $table->string('tipe'); // standard, deluxe, VIP
        $table->decimal('harga_per_bulan', 10, 2);
        $table->enum('status', ['tersedia', 'terisi', 'maintenance'])->default('tersedia');
        $table->text('fasilitas')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamar');
    }
};
