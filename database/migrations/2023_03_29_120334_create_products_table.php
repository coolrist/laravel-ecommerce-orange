<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("category_id");
            $table->string("name");
            $table->mediumText("description");
            $table->string("image1");
            $table->string("image2");
            $table->string("image3");
            $table->string("image4");
            $table->unsignedDouble("price", places: 2);
            $table->unsignedDouble("special_offer", total: 4, places: 2);
            $table->string("color");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('products');
    }
};
