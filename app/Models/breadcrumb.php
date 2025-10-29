<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class breadcrumb extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function products()

    {
      return $this->belongstomany(Product::class, 'Product_breadcrumb', 'breadcrumb_id', 'product_id');
    }
}
