<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->nullable()->primary(); // Kiểu unsignedBigInteger và nullable
            $table->string('name')->nullable();;
            $table->text('description')->nullable();;
            $table->string('urlImg')->nullable();;
            $table->string('urlproduct')->nullable();;
            $table->string('category')->nullable();;
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
};
