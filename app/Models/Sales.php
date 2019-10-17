<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'protocol', 
        'typePay',
        'totalPay',
    ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'Sales';
    public function Clientsales()
    {
        return $this->hasMany(client::class);
    }
}
