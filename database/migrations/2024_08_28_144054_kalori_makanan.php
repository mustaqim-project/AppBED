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
        Schema::create('kalori_makanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->string('golongan'); // Golongan makanan (misalnya: "Karbohidrat", "Protein Hewani", dsb.)
            $table->string('satuan'); // Satuan ukuran rumah tangga (misalnya: "bh", "gls", "sdm", dsb.)
            $table->integer('berat'); // Berat dalam gram untuk satuan ukuran rumah tangga
            $table->integer('kalori_per_satuan'); // Jumlah kalori per satuan penukar
            $table->integer('kalori_per_gram'); // Jumlah kalori per gram makanan
            $table->integer('protein_per_satuan'); // Kandungan protein per satuan penukar (dalam gram)
            $table->integer('lemak_per_satuan'); // Kandungan lemak per satuan penukar (dalam gram)
            $table->integer('karbohidrat_per_satuan'); // Kandungan karbohidrat per satuan penukar (dalam gram)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
