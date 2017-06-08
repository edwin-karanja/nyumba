<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('location')->nullable();
            $table->integer('bedrooms');
            $table->integer('ensuite_number')->nullable();
            $table->string('image_path');
            $table->string('land_area')->nullable();
            $table->string('building_area')->nullable();
            $table->string('ownership')->default('leasehold');
            $table->float('price')->default(100000);
            $table->string('currency', 10)->default('Kshs');
            $table->text('key_features')->nullable();

            $table->smallInteger('published')->default(0);
            $table->unsignedInteger('type_id')->default(1);

            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
