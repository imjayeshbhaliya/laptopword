<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_address extends Model
{
    use HasFactory;
    protected $table='shipping_address';
    protected $fillable=['user_id','name','email','mobile_number','state','city','pincode','address'];
}
