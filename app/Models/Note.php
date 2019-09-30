<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'note',
    ];
    
    protected $guarded = ['id', 'created_at', 'update_at'];
    
    protected $table = 'notes';
        
    public function observacao()
    {
        return $this->belongsTo(ServiceOrder::class);
    }
}
