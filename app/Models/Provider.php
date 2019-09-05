<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'nameFant',
        'record', 
        'email', 
        'phoneP',
        'tell', 
        'address',
        'bai',
        'numberHouse', 
        'comp', 
        'city', 
        'state', 
        'cep',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'providers';

    public function produtos()
    {
        return $this->belongsToMany(Product::class, 'provand_prods');
    }
}
