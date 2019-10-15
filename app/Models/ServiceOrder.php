<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'protocol',
        'name',
        'service', 
        'priority', 
        'status',
        'responsible', 
        'description',
        'dateExec',
        'client_id',
    ];
    protected $guarded = [ 'id', 'created_at', 'update_at'];

    protected $table = 'service_orders';

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function observaco()
    {
        return $this->hasMany(Note::class);
    }
}
