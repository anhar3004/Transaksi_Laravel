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
        Schema::create('t_sales_det', function (Blueprint $table) {
            $table->id('sales_id');
            $table->foreignId('barang_id');
            $table->foreignId('transaksi_id');
            $table->decimal('harga_bandrol',12,2);
            $table->integer('qty');
            $table->decimal('diskon_pct',12,2);
            $table->decimal('diskon_nilai',12,2);
            $table->decimal('harga_diskon',12,2);
            $table->decimal('total',12,2);
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('m_barang');
            $table->foreign('transaksi_id')->references('id')->on('t_sales');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sales_det');
    }
};
