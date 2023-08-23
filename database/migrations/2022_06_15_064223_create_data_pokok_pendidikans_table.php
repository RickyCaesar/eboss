<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPokokPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pokok_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->string('satuan_pendidikan');
            $table->string('npsn');
            $table->string('bentuk_pendidikan');
            $table->string('kab_kota_sp');
            $table->integer('peserta_didik');
            $table->bigInteger('pagu_bosnas');
            $table->bigInteger('pagu_bosda');
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
        Schema::dropIfExists('data_pokok_pendidikans');
    }
}
