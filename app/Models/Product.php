<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod',
        'description',
        'brand',
        'priceNew',
        'priceOld',
        'invoice',
        'provider',
        'amount',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'products';
    
    public function provider() 
    {
        return $this->belongsToMany(Provider::class, "provand_prods");
    }
    public function salesProducts()
    {
        return $this->hasMany(salesProducts::class);
    }
}