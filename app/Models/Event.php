<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'start_date',
        'end_date'
    ];

    protected $guarded = [ 'id', 'created_at', 'update_at'];

    protected $table = 'events';
}
