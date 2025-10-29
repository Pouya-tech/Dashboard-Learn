<?php

namespace App\Models;
// use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function products()
    {
      return $this->belongsToMany(Product::class, 'product_category', 'categorty_id', 'product_id');
    }
}
