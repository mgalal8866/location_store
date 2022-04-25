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
			$table->string('name', 250);
            $table->string('slug')->nullable();
            $table->text('address')->nullable();
            $table->string('lat', 250);
            $table->string('lng', 250);
            $table->integer('view')->default(0)->comment('المشاهدات');
            $table->integer('product_num')->default(0);
            $table->integer('top')->default(0)->comment('تميز الفرع');
            $table->string('opentime', 250)->comment('وقت فتح')->nullable();
            $table->string('closetime', 250)->comment('وقت اغلاق')->nullable();
            $table->date('start_date')->comment('تاريخ بدايه التفعيل')->nullable();
            $table->date('expiry_date')->comment('تاريخ انتهاءالتفعيل')->nullable();
            $table->tinyInteger('active')->default('0')->comment('[0 = مفعل] [1 = غير مفعل]');
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
