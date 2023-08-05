<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartype extends Model
{
    protected $table = 'cartypes';

    protected $fillable = ['id',
        'name'
    ];

    public function cars(){
        return $this->hasMany(Car::class, 'cartype_id');
    }

    public function busy(){
        $cars = Car::all();
        foreach($cars as $car){
            if($car->cartype->id == $this->id) return true;
        }
        return false;
    }
}
