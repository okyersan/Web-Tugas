<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_tugas', function (Blueprint $table) {
            $table->increments('id_tugas');
            $table->string('kode_kelas' , 10);
            $table->string('nama_tugas');
            $table->integer('id_guru');
            $table->date('terakhir_pengumpulan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_tugas');
    }
}
