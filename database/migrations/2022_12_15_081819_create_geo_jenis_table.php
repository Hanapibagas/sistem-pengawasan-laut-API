<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoJenisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_jenis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenis_id');
            $table->string('nama_geo');
            $table->text('deskripsi')->nullable();
            $table->longText('di_perbolehkan')->nullable();
            $table->longText('tidak_diperbolehkan')->nullable();
            $table->longText('diperbolehkan_bersyarat')->nullable();
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
        Schema::dropIfExists('geo_jenis');
    }
}
