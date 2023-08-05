<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Carstate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CarstateController extends Controller
{

    public function __construct(){

    }

    public function index(){
        $carstates = Carstate::orderBy('created_at', 'desc')->get();
        return view('intranet.carstate.list', compact('carstates'));
    }

    public function show($id){
        $carstate = Carstate::find($id);
        return view('intranet.carstate.show', compact('carstate'));
    }

    public function create(){
        return view('intranet.carstate.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $last = Carstate::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Carstate::create($data);
        if($insert) return Redirect::route('intranet.indexCarstate')->with('success', 'L\'état a été bien crée.');
        return;
    }

    public function edit($id){
        $carstate = Carstate::find($id);
        return view('intranet.carstate.edit', compact('carstate'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Carstate::find($id)->update($data);
        return Redirect::route('intranet.indexCarstate')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Carstate::find($id)->delete();
        return Redirect::route('intranet.indexCarstate')->with('success', 'Suppression effectuée avec succès');
    }

}