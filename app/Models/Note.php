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
        'note',
        'service_id',
        ];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'notes';

    public function Observacao()
    {
        return $this->belongsTo(ServiceOrder::class);
    }
}
