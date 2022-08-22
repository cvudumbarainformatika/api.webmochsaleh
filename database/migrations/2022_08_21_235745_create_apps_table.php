<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullable();
            $table->string('nama')->nullable();
            $table->string('title')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desc')->nullable();
            $table->string('phone')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_youtube')->nullable();
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
        Schema::dropIfExists('apps');
    }
}
