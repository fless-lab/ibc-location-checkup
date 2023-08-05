<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carback extends Model
{
    protected $table = 'carbacks';

    protected $fillable = ['id',
        'reservation_id', 'leasing_id', 'state', 'damage', 'kilometrage', 'gasoline',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function leasing(){
        return $this->belongsTo(Leasing::class);
    }

}
