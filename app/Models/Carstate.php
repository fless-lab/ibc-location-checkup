<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carstate extends Model
{
    protected $table = 'carstates';

    protected $fillable = ['id',
        'name'
    ];

    public function busy(){
        $cars = Car::all();
        foreach($cars as $car){
            if($car->carstate->id == $this->id) return true;
        }
        return false;
    }
}
