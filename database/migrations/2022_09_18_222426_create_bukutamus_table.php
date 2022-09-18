<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukutamusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukutamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->text('pesan')->nullable();
            $table->integer('ratings')->default(0);
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
        Schema::dropIfExists('bukutamus');
    }
}
