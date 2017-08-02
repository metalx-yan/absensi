<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('mata_kuliah');
            $table->timestamps();
        });
        
        Schema::table('absens', function($table) {
            $table->unsignedInteger('mahasiswa_id');
            $table->unsignedInteger('ruang_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('ruang_id')->references('id')->on('ruangs')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('absens', function($table) {
                    $table->dropForeign(['mahasiswa_id']);
                    $table->dropForeign(['ruang_id']);

                });

        Schema::dropIfExists('ruangs');
    }
}
