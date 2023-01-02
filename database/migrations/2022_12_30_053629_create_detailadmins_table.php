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
        Schema::create('detailadmins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->string('tpt_lhr');
            $table->string('tgl_lhr');
            $table->string('umur');
            $table->string('foto')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('background')->nullable();
            $table->string('no_hp')->nullable();
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
        Schema::dropIfExists('detailadmins');
    }
};
