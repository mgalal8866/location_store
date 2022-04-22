<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('category_id');
			$table->string('name', 250);
            $table->string('slug')->nullable();
            $table->text('address')->nullable();
            $table->string('lat', 250);
            $table->string('lng', 250);
            $table->integer('view')->default(0)->comment('المشاهدات');
            $table->integer('product_num')->default(0);
            $table->integer('top')->default(0)->comment('تميز الفرع');
            $table->string('opentime', 250)->comment('وقت فتح');
            $table->string('closetime', 250)->comment('وقت اغلاق');
            $table->date('start_date')->comment('تاريخ بدايه التفعيل');
            $table->date('expiry_date')->comment('تاريخ انتهاءالتفعيل');
            $table->tinyInteger('active')->default('1');
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
        Schema::dropIfExists('branchs');
    }
}
