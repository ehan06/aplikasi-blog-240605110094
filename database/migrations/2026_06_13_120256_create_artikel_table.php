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
    Schema::create('artikel', function (Blueprint $table) {
        $table->id();

        $table->unsignedBigInteger('id_penulis');
        $table->unsignedBigInteger('id_kategori');

        $table->string('judul');
        $table->longText('isi');

        $table->string('gambar')->nullable();

        $table->date('hari_tanggal');

        $table->foreign('id_penulis')
              ->references('id')
              ->on('penulis')
              ->onDelete('cascade');

        $table->foreign('id_kategori')
              ->references('id')
              ->on('kategori_artikel')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
