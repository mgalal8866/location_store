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
            $table->unsignedBigInteger('stores_id');
			$table->string('name', 250)->nullable();
            $table->string('slug')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('lat', 250)->nullable();
            $table->string('lng', 250)->nullable();
            $table->integer('view')->default(0)->comment('المشاهدات');
            $table->integer('product_num')->default(0);
            $table->integer('top')->default(0)->comment('تميز الفرع');
            $table->string('opentime', 250)->comment('وقت فتح')->nullable();
            $table->string('closetime', 250)->comment('وقت اغلاق')->nullable();
            $table->dateTime('start_date')->comment('تاريخ بدايه التفعيل')->nullable();
            $table->dateTime('expiry_date')->comment('تاريخ انتهاءالتفعيل')->nullable();
            $table->tinyInteger('active')->default('1')->comment('[0 = مفعل] [1 = غير مفعل]');
            $table->tinyInteger('accept')->default('1')->comment('[0 = مقبول] [1 =  انتظار] [2 = مرفوض ]');
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
