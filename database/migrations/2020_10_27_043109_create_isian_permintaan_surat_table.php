<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsianPermintaanSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isian_permintaan_surat', function (Blueprint $table) {
            $table->bigIncrements('isian_permintaan_surat_id');
            $table->foreignId('permintaan_surat_id');
            $table->foreign('permintaan_surat_id')->references('permintaan_surat_id')->on('permintaan_surat');
            $table->string('nama_isian');
            $table->string('nilai_isian')->nullable();
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
        Schema::dropIfExists('isian_permintaan_surat');
    }
}
