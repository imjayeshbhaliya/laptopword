<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\Product;
use App\Modules\Category\Models\Category;
use App\Modules\Colour\Models\Colour;


class Cart extends Model
{
    use HasFactory;
    protected $table='cart';
    protected $fillable=['user_id','product_id','qty'];

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id','id');

    }
}