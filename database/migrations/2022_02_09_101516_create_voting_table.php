<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mhs');
            $table->integer('id_pemira');
            $table->integer('id_ormawa');
            $table->integer('id_kandidat');
            $table->string('status');

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
        Schema::dropIfExists('voting');
    }
}
