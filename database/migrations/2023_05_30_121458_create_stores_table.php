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
            $table->id();
            $table->uuid('uuid_store')->index();
            $table->string("name")->unique();
            $table->string("slug");
            $table->string("description");
            $table->string("phone");
            $table->string("mobile_phone");  
            $table->uuid('user_uuid')->index();
            $table->string('logo')->nullable();
            $table->foreign('user_uuid')->references('user_uuid')->on('users')->onDeleteCascade();
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
