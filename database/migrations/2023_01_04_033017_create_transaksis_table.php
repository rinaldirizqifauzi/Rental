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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('rental_id');
            $table->enum('status_transaksi', ['pending', 'success']);
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->enum('pick_up', ['sendiri' ,'antar']);
            $table->enum('driver_confirm', ['iya','tidak']);
            $table->string('total')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
};
