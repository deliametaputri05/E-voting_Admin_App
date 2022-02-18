<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonKetuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_ketua', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jurusan');
            $table->integer('id_ormawa');
            $table->integer('nim');
            $table->string('nama');
            $table->string('angkatan');
            $table->string('kelas');
            $table->text('foto');
            $table->string('alamat');
            $table->string('moto');


            $table->softDeletes();
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
        Schema::dropIfExists('calon_ketua');
    }
}
