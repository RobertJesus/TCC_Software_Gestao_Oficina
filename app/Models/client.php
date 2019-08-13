<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'name',
        'date',
        'record',
        'sex', 
        'email', 
        'phoneP',
        'phoneS', 
        'tell', 
        'address', 
        'numberHouse', 
        'comp', 
        'city', 
        'state', 
        'cep',];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'clients';
}
