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
            $table->boolean('urlstate')->default(0)->comment('[0 = false] [1 = true ]');
            $table->string('url')->nullable();
            $table->boolean('branchstate')->default(0)->comment('[0 = false] [1 = true ]');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->boolean('productstate')->default(0)->comment('[0 = false] [1 = true ]');
            $table->unsignedBigInteger('product_id')->nullable();
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
