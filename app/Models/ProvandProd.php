<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvandProd extends Model
{
    protected $fillable = [
        'product_id',
        'provider_id',
    ];
    protected $table = 'provand_prods';
}
