<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_clnKetua');
            $table->integer('id_clnWakil')->nullable();
            $table->integer('id_pemira');
            $table->integer('id_ormawa');
            $table->integer('no_urut');
            $table->text('foto');
            $table->text('visi');
            $table->text('misi');
            $table->integer('jhasil_suara');

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
        Schema::dropIfExists('kandidat');
    }
}
