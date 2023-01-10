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
            $table->char('user_id', 36);
            $table->foreignId('rental_id');
            $table->enum('status_transaksi', ['pending', 'success', 'clear']);
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->enum('pick_up', ['sendiri' ,'antar']);
            $table->enum('driver_confirm', ['iya','tidak']);
            $table->string('total')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
};
