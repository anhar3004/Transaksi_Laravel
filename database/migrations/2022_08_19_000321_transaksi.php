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
        Schema::create('t_sales', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi',15);
            $table->dateTime('tgl');
            $table->foreignId('cust_id');
            $table->integer('qty')->nullable();
            $table->decimal('subtotal',12,2)->nullable();
            $table->decimal('diskon',12,2)->nullable();
            $table->decimal('ongkir',12,2)->nullable();
            $table->decimal('total_bayar',12,2)->nullable();
            $table->timestamps();

            $table->foreign('cust_id')->references('id')->on('m_customer');
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
        Schema::dropIfExists('t_sales');
    }
};
