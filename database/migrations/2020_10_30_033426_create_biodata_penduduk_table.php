<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_penduduk', function (Blueprint $table) {
            $table->string('no_nik');
            $table->primary('no_nik');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->enum('sdhk', ['Kepala Keluarga', 'Istri', 'Anak']);
            $table->foreignId('agama_id')->nullable();
            $table->string('pendidikan_terakhir');
            $table->string('pekerjaan');
            $table->string('nama_ibu');
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
        Schema::dropIfExists('biodata_penduduk');
    }
}
