<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Carmodel extends Model
{
    protected $table = 'carmodels';

    protected $fillable = ['id',
        'name', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function busy(){
        $cars = Car::all();
        foreach($cars as $car){
            if($car->carmodel->id == $this->id) return true;
        }
        return false;
    }



}
