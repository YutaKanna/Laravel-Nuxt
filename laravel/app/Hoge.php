<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoge extends Model
{
    protected $table = 'hoge';

    protected $fillable = [
        'name', 'image',
    ];

    protected $casts = [
        'image' => 'array'
    ];
}