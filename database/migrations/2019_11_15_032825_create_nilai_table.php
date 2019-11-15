<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mahasiswa_id')->index()->nullable();
            $table->unsignedBigInteger('kriteria_id')->index()->nullable();
            $table->float('nilai_alt')->unsigned()->nullable();
            
            // $table->timestamps();
            $table->foreign('mahasiswa_id')
            ->references('id')
            ->on('mahasiswa')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriteria')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
