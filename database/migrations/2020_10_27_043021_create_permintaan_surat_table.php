<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanSuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_surat', function (Blueprint $table) {
            $table->bigIncrements('permintaan_surat_id');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('jenis_surat_id');
            $table->foreign('jenis_surat_Id')->references('jenis_surat_id')->on('jenis_surat');
            $table->enum('status_surat', ['diajukan', 'sedang diproses', 'ditolak' ,'selesai'])->default('diajukan');
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
        Schema::dropIfExists('permintaan_surat');
    }
}
