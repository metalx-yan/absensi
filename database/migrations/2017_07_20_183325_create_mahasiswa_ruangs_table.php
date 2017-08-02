<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_ruang', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');

            $table->unsignedInteger('ruang_id');    
            $table->foreign('ruang_id')->references('id')->on('ruangs');
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
        Schema::table('mahasiswa_ruang', function($table) {
            $table->dropForeign('mahasiswa_ruang_mahasiswa_id_foreign');
            $table->dropForeign('mahasiswa_ruang_ruang_id_foreign');
        });

        Schema::dropIfExists('mahasiswa_ruang');
    }
}
