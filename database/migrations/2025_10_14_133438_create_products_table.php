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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

        // 🏷️ اطلاعات محصول
        $table->string('product_title');
        $table->string('product_subtitle')->nullable();
        $table->string('product_code')->unique();
        $table->string('slug')->unique();
        $table->integer('weight_grams')->nullable();
        $table->string('image_label')->nullable();
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();

        // 💰 قیمت‌گذاری
        $table->decimal('purchase_price', 10, 2)->nullable(); // قیمت خرید
        $table->decimal('sale_price', 10, 2)->nullable();     // قیمت فروش
        $table->decimal('partner_price', 10, 2)->nullable();  // قیمت همکاری
        $table->string('discount_type')->nullable();          // نوع تخفیف (درصد / تومان)
        $table->decimal('discount_value', 10, 2)->nullable(); // مقدار تخفیف
        $table->integer('min_sale_quantity')->default(1);
        $table->integer('max_sale_quantity')->nullable();

        // 📝 توضیحات
        $table->longText('description')->nullable();
        $table->text('short_description')->nullable();

        // 📏 جدول سایز
        $table->string('size')->nullable();
        $table->string('waist_size')->nullable();
        $table->string('hip_size')->nullable();
        $table->string('thigh_size')->nullable();

        // ⚙️ ویژگی‌ها
        $table->text('product_features_search_filter')->nullable();
        $table->text('product_features')->nullable();

        // 🚀 انتشار
        $table->string('publish_state')->default('draft'); // draft / published
        $table->dateTime('publish_date')->nullable();

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
