<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemiraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemira', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ormawa');
            $table->string('nama');
            $table->string('foto');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');

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
        Schema::dropIfExists('pemira');
    }
}
