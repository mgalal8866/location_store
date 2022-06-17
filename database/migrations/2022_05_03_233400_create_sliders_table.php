<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->enum('type',['image','product','store','url'])->nullable();
            $table->string('event')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->tinyInteger('active')->default('1')->comment('[0 = مفعل] [1 = غير مفعل]');
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
        Schema::dropIfExists('sliders');
    }
}
