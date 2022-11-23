<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiotaLautsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biota_lauts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kabupaten_kota_id');
            $table->bigInteger('jenis_biota_laut_id');
            $table->string('latitude');
            $table->string('longtitude');
            $table->longText('deskripsi');
            $table->string('jumlah_populasi');
            $table->string('gambar');
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
        Schema::dropIfExists('biota_lauts');
    }
}
