<?php

namespace App\Models;
use APP\Models\brand;
use APP\Models\breadcrumb;
use APP\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_title',
        'product_subtitle',
        'product_code',
        'slug',
        'weight_grams',
        'image_label',
        'meta_title',
        'meta_description',
        'purchase_price',
        'sale_price',
        'partner_price',
        'discount_type',
        'discount_value',
        'min_sale_quantity',
        'max_sale_quantity',
        'description',
        'short_description',
        'size',
        'waist_size',
        'hip_size',
        'thigh_size',
        'product_features_search_filter',
        'product_features',
        'publish_state',
        'publish_date',
        'brand_id',
    ];
    public function categories()
    {
      return $this->belongsTo(category::class);
    }

        public function brand()
    {
      return $this->belongsTo(brand::class);
    }

        public function breadcrumb()
    {
      return $this->belongsTo(breadcrumb::class);
    }
}
