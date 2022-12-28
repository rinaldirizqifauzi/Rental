<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mobil');
            $table->unsignedBigInteger('id_spesifikasi');
            $table->unsignedBigInteger('id_tipe');
            $table->unsignedBigInteger('id_warna');
            $table->unsignedBigInteger('id_mesin');
            $table->enum('status', ['Tersedia', 'Tidak Tersedia']);
            $table->string('no_polisi_1');
            $table->string('no_polisi_2');
            $table->string('no_polisi_3');
            $table->string('bb');
            $table->string('harga');
            $table->timestamps();

            $table->foreign('id_spesifikasi')->references('id')->on('spesikasis')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tipe')->references('id')->on('tipes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_warna')->references('id')->on('warnas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mesin')->references('id')->on('mesins')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
};
