<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Payment;
use App\Models\Billing_address;
use App\Modules\Product\Models\Product;

class Order_details extends Model
{
    use HasFactory;
    protected $table='orderdetails';
    protected $fillable=['user_id','order_id ','product_id','quantity','total_price'];

    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id','id');

    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id','id');

    }
    
}
