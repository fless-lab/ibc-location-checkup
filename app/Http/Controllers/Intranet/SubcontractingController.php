<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Car;
use App\Models\Leasing;
use App\Models\Reservation;
use App\Models\Subcontracting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class SubcontractingController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $subcontractings = Subcontracting::orderBy('created_at', 'desc')->get();
        return view('intranet.subcontracting.list', compact('subcontractings'));
    }

    public function show($id, $type){
        $subcontracting = Subcontracting::find($id);
        return view('intranet.subcontracting.show', compact('subcontracting'));
    }

    public function create($type){
        $reservations = Reservation::all();
        $leasings = Leasing::all();
        return view('intranet.subcontracting.create', compact('reservations', 'leasings', 'type'));
    }

    public function store(Request $request){
        $data = $request->all();

        $last = Subcontracting::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = Subcontracting::create($data);
        if($insert) return Redirect::route('intranet.indexSubcontracting')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id, $type){
        $reservations = Reservation::all();
        $leasings = Leasing::all();
        $subcontracting = Subcontracting::find($id);
        return view('intranet.subcontracting.edit', compact('subcontracting', 'reservations', 'leasings', 'type'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Subcontracting::find($id)->update($data);
        return Redirect::route('intranet.indexSubcontracting')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Subcontracting::find($id)->delete();
        return Redirect::route('intranet.indexSubcontracting')->with('success', 'Suppression effectuée avec succès');
    }
}