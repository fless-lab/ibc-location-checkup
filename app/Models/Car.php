<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Car extends Model
{
    protected $table = 'cars';

    protected $fillable = ['id',
        'mark', 'cartype_id', 'carmodel_id', 'carstate_id', 'category_id', 'color',
        'registration', 'available', 'active', 'amount', 'description', 'place',
        'baggage', 'door', 'kilometrage', 'fuel', 'gasoline', 'damage', 'amount_hour', 'year',
        'lome_accra', 'lome_cotonou', 'bail', 'mark_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function cartype(){
       return $this->belongsTo(Cartype::class);
    }

    public function carmodel(){
        return $this->belongsTo(Carmodel::class);
    }

    public function carfiles(){
        return $this->hasMany(Carfile::class);
    }

    public function carstate(){
        return $this->belongsTo(Carstate::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function mark(){
        return $this->belongsTo(Mark::class);
    }

    public function setAvailable(){
        $reservations = Reservation::where('car_id', $this->id)->get();
//        $leasings = Leasing::where('car_id', $this->id)->get();

        foreach ($reservations as $reservation){
            $invoice = Invoice::where('reservation_id', $reservation->id)->first();
            if($invoice){
                $date_back = Carbon::parse($invoice->date_back);
                $date_start = Carbon::parse($invoice->date_start);

                if($date_start->lte(new Carbon())){
                    $reservation->car->available = 0;
                    $reservation->car->save();
                    if($date_back->lte(new Carbon())){
                        $reservation->car->available = 1;
                        $reservation->car->save();

                    }
                }

            }
        }

//        foreach ($leasings as $leasing){
//            $invoice = Invoice::where('leasing_id', $leasing->id)->first();
//            if($invoice){
//                $date_back = Carbon::parse($invoice->date_back);
//                if($date_back->lt(new Carbon())){
//                    $leasing->car->available = 1;
//                    $leasing->car->save();
//                }
//            }
//        }
    }

    public function busy(){
        $reservations = Reservation::all();
        $leasings = Leasing::all();

        foreach($reservations as $reservation){
            if($reservation->car->id == $this->id) return true;
        }

        foreach($leasings as $leasing){
            if($leasing->car->id == $this->id) return true;
        }

        return false;
    }


}
