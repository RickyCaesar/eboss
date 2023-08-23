<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranBosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran_bos', function (Blueprint $table) {
            $table->id();
            $table->string('kd_rekening');
            $table->enum('jenis_bos', ['bosnas', 'bosda']);
            $table->bigInteger('pagu')->default(0);
            $table->string('email_sp');
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
        Schema::dropIfExists('anggaran_bos');
    }
}
