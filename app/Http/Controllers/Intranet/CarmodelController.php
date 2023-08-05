<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Carmodel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class CarmodelController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $carmodels = Carmodel::orderBy('created_at', 'desc')->get();
        return view('intranet.carmodel.list', compact('carmodels'));
    }

    public function show($id){
        $carmodel = Carmodel::find($id);
        return view('intranet.carmodel.show', compact('Carmodel'));
    }

    public function create(){
        return view('intranet.carmodel.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $last = Carmodel::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Carmodel::create($data);
        if($insert) return Redirect::route('intranet.indexCarmodel')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $carmodel = Carmodel::find($id);
        return view('intranet.carmodel.edit', compact('carmodel'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Carmodel::find($id)->update($data);
        return Redirect::route('intranet.indexCarmodel')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Carmodel::find($id)->delete();
        return Redirect::route('intranet.indexCarmodel')->with('success', 'Suppression effectuée avec succès');
    }
}