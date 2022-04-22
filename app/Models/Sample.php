<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable = [
        'id',
        'isActive',
        'name',
        'balance',
        'greeting',
        'favoriteTransportation'
    ];
}
