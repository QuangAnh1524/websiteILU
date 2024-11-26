<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void


    /**
     * Reverse the migrations.
     */  {
Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('parent_id');
        $table->timestamps();
    });

Schema::create('categories_product', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->foreignIdFor(\App\Models\Product::class)->constrained()->cascadeOnDelete();
        $table->foreignIdFor(\App\Models\Category::class)->constrained()->cascadeOnDelete();
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('categories_product');
        Schema::dropIfExists('categories');
    }
};
