<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas' , 10);
            $table->string('nama_kelas' , 25);
            $table->integer('id_guru');
            $table->date('tanggal_dibuat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_kelas');
    }
}
