<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('mahasiswas_id')->unsigned();
            $table->bigInteger('matakuliahs_id')->unsigned();
            $table->string('tahun_ajaran', 20);
            $table->string('nilai', 5)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas');
            $table->foreign('matakuliahs_id')->references('id')->on('matakuliahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('krs');
    }
}
