<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesProduct extends Model
{
    protected $fillable = [
        'protocol',  
        'product_id',
        'amount',
        'desc', 
        'price',
        'priceV',
        'total',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'sales_products';
    public function produto()
    {
        return $this->belongsTo(Product::class);
    }
}
