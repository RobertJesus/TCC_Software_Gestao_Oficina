<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'km',
        'kmDay',
        'dateReview',
        'board',
        'brand',
        'client',
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'automobiles';
}
