<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiDataSatuanPendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_data_satuan_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->text('konfirmasi');
            $table->string('author');
            $table->enum('status_k', ['0', '1', '2'])->default(0);
            $table->string('verifikator')->nullable();
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
        Schema::dropIfExists('konfirmasi_data_satuan_pendidikans');
    }
}
