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
        Schema::create('sewas', function (Blueprint $table) {
            $table->id();
            $table->string('id_customer');
            $table->string('id_mobil');
            $table->string('kode_transaksi');
            $table->string('tanggal_sewa');
            $table->string('tanggal_kembali');
            $table->string('lama_sewa');
            $table->string('total_biaya');
            $table->string('deskripsi');
            $table->string('is_status');
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
        Schema::dropIfExists('sewas');
    }
};
