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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (penilai dan yang dinilai) 
            $table->foreignId('penilai_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('pegawai_id')->constrained('users')->onDelete('cascade');

            // 8 aspek pertanyaan (gabungan dari `sibukkerja`)
            $table->tinyInteger('nilai_1');
            $table->tinyInteger('nilai_2');
            $table->tinyInteger('nilai_3');
            $table->tinyInteger('nilai_4');
            $table->tinyInteger('nilai_5');
            $table->tinyInteger('nilai_6');
            $table->tinyInteger('nilai_7');
            $table->tinyInteger('nilai_8');

            // Total dan nilai akhir
            $table->integer('total_nilai')->nullable(); // boleh nullable karena bisa dihitung kemudian
            $table->float('nilai_akhir')->nullable();   // sama, bisa dihitung otomatis

            // Periode penilaian
            $table->tinyInteger('triwulan');
            $table->year('tahun');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};