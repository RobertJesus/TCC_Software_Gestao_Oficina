<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    public function Orders()
    {
        return $this->hasMany(ServiceOrder::class);
    }
}
