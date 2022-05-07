<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('branch_id');
			$table->string('name', 250);
            $table->string('slug')->nullable();
            $table->string('price')->nullable();
            $table->date('start_date')->nullable()->comment('تاريخ بدايه التفعيل');
            $table->date('expiry_date')->nullable()->comment('تاريخ انتهاءالتفعيل');
            $table->tinyInteger('active')->default('1')->comment('[0 = مفعل] [1 = غير مفعل]');
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
        Schema::dropIfExists('products');
    }
}
