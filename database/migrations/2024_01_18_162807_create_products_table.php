<?php

use App\Models\products;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('name');
            $table->foreignId('part_id')->references('part_id')->on('parts');
            $table->foreignId('brand_id')->references('brand_id')->on('brands');
            $table->timestamps();
        });

        products::create(['product_id' => 1, 'name' => 'Seggszőrnyíró', 'part_id' => 1, 'brand_id' => 1]);
        products::create(['product_id' => 2, 'name' => 'Orrszőrnyíró', 'part_id' => 2, 'brand_id' => 2]);
    }


    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
