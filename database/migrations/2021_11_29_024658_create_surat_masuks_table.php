<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            
            $table->id();
            $table->string('Kode_surat')->unique();
            $table->timestamp('Tanggal_surat')->nullable();
            $table->string('Isi_surat_masuk');
            $table->string('Fakultas');
            $table->string('Jurusan');
            $table->string('Universitas');
            $table->timestamps();
            $table->foreignId('user_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
}