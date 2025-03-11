<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_peminjam');
            $table->unsignedBigInteger('id_sepeda');
            $table->date('tgl_pinjam');
            $table->date('tgl_pulang');
            $table->integer('bayar');
            $table->integer('denda');
            $table->string('jaminan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_peminjam')->references('id_peminjam')->on('peminjam')->onDelete('cascade');
            $table->foreign('id_sepeda')->references('id_sepeda')->on('sepeda')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function(Blueprint $table){
            $table->dropForeign(['id_peminjam']);
            $table->dropForeign(['id_sepeda']);
        });
        Schema::dropIfExists('transaksi');
    }
};
