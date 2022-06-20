<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('display_name');
            $table->string('key');
            $table->string('value')->nullable();
            $table->string('details')->nullable();
            $table->string('type');
            $table->string('section');
            $table->string('ordering');
            // $table->string('splash');
            // $table->string('site_title');
            // $table->string('site_name');
            // $table->string('site_email');
            // $table->string('footer_text');
            // $table->integer('app_new_branch')->default(10);
            // $table->integer('app_pag')->default(10);
            // $table->integer('app_pagforsearch_branch')->default(10);
            // $table->integer('app_page_branch')->default(10);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
