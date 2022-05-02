<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
			$table->string('name', 250);
            $table->string('slug')->nullable();
            $table->tinyInteger('active')->default('1')->comment('[0 = مفعل] [1 = غير مفعل]');
            $table->date('start_date')->comment('تاريخ بدايه التفعيل')->nullable();
            $table->date('expiry_date')->comment('تاريخ انتهاءالتفعيل')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('stores');
    }
}
