<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Billing_address;
use App\Models\Payment;
 

class Orders extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=['user_id','billing_id','shipping_id','payment_id','total_price','order_status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');

    }

    public function billing_address()
    {
        return $this->belongsTo(Billing_address::class, 'billing_id','id');

    }
    public function shipping_address()
    {
        return $this->belongsTo(Billing_address::class, 'shipping_id','id');

    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id','id');

    }
}  
