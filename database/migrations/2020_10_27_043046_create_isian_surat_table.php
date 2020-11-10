<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsianSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isian_surat', function (Blueprint $table) {
            $table->bigIncrements('isian_surat_id');
            $table->foreignId('jenis_surat_id');
            $table->foreign('jenis_surat_id')->references('jenis_surat_id')->on('jenis_surat');
            $table->string('nama_isian');
            $table->string('contoh_isian')->nullable();
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
        Schema::dropIfExists('isian_surat');
    }
}
