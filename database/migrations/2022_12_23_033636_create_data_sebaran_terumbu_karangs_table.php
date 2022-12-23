<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSebaranTerumbuKarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sebaran_terumbu_karangs', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->string('luas_lahan');
            $table->string('kondisi_baik');
            $table->string('kondisi_sedang');
            $table->string('kondisi_rusak');
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
        Schema::dropIfExists('data_sebaran_terumbu_karangs');
    }
}
