<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgamaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agama', function (Blueprint $table) {
            $table->bigIncrements('agama_id');
            $table->string('agama_nama');
            $table->timestamps();
        });
        Schema::table('biodata_penduduk', function (Blueprint $table) {
            $table->foreign('agama_id')->references('agama_id')->on('agama')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agama');
    }
}
