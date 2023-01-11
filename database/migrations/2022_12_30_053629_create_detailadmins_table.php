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
            $table->char('user_id', 36);
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

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
