<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotulensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulensi', function (Blueprint $table) {
            $table->id();
            $table->string('Kode_notulen')->unique();
            $table->timestamp('Tanggal_rapat')->nullable();
            $table->string('Upload_surat_undangan');
            $table->string('Jurusan');
            $table->string('Catatan');
            $table->string('Rekomendasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notulensis');
    }
}
