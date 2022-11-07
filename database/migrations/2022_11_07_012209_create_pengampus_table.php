<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengampusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengampus', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('matakuliahs_id')->unsigned();
            $table->bigInteger('dosens_id')->unsigned();
            $table->text('tahun_ajaran');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('matakuliahs_id')->references('id')->on('matakuliahs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dosens_id')->references('id')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pengampus');
    }
}
