<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id',
        'name', 'email', 'password', 'type', 'role', 'telephone',
        'cni', 'resource_name', 'resource_num', 'operator_num', 'photo',
        'active', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->role == 'admin';
    }

    public function reservations(){
        $this->hasMany(Reservation::class);
    }

    public function leasings(){
        $this->hasMany(Leasing::class);
    }

    public function payments(){
        $this->hasMany(Payment::class);
    }

    public function busy(){
        $reservations = Reservation::all();
        $leasings = Leasing::all();

        foreach($reservations as $reservation){
            if($reservation->user->id == $this->id) return true;
        }

        foreach($leasings as $leasing){
            if($leasing->user->id == $this->id) return true;
        }

        return false;
    }



}
