<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    protected $fillable = ['id',
        'tva', 'reduction_rate', 'no_driver_rate', 'bail_rate', 'kilometer', 'sup_amount', 'charge'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


}
