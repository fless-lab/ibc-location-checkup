<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carfile extends Model
{
    protected $table = 'carfiles';

    protected $fillable = ['id',
        'name', 'path', 'car_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function car(){
        $this->belongsTo(Car::class);
    }
}
