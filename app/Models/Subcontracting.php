<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcontracting extends Model
{
    protected $table = 'subcontractings';

    protected $fillable = ['id',
        'reservation_id', 'leasing_id', 'company', 'disposal_amount'
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class);
    }

    public function leasing(){
        return $this->belongsTo(Leasing::class, 'leasing_id');
    }
}
