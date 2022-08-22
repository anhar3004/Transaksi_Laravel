<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tb_User', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('foto');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('level');
            $table->rememberToken();
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
        Schema::dropIfExists('Tb_User');
    }
};
