<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('content')->nullable();
            $table->text('thumbnail')->nullable();
            $table->string('flag')->nullable()->comment('null / kosong / empty: pelayanan, 1:pokja');
            $table->string('animation')->nullable();
            $table->integer('urut')->nullable();
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
        Schema::dropIfExists('pelayanans');
    }
}
