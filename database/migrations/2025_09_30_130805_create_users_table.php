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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('picture')->nullable();
            $table->string('type')->default("Customer");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. khs skkke kkd nkkker ;
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
