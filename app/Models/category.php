<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';

    protected $fillable = ['id',
        'name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function car(){
        $this->belongsTo(Car::class);
    }

    public function busy(){
        $cars = Car::all();
        foreach($cars as $car){
            if($car->category->id == $this->id) return true;
        }
        return false;
    }
}
