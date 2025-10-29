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
    {
        Schema::table('products_images', function (Blueprint $table) {
            $table->dropColumn('is_main');

            $table->string('product_featured_images');
            $table->string('product_gallery_images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_images', function (Blueprint $table) {
            $table->boolean('is_main')->default(false);

            $table->dropColumn('product_featured_images');
            $table->dropColumn('product_gallery_images');
        });
    }
};
