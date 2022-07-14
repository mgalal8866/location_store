<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
        Schema::table('stores', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('branchs', function(Blueprint $table) {
            $table->foreign('stores_id')->references('id')->on('stores')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
            Schema::table('products', function(Blueprint $table) {
                $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');
            });
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('regions', function(Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
            Schema::table('product_images', function(Blueprint $table) {
                $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            });
            Schema::table('comments', function(Blueprint $table) {
                $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
            Schema::table('sliders', function(Blueprint $table) {
                $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
                $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            });
        Schema::table('abouts', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
