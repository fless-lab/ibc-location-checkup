<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Cartype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class CartypeController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $cartypes = Cartype::orderBy('created_at', 'desc')->get();
        return view('intranet.cartype.list', compact('cartypes'));
    }

    public function show($id){
        $cartype = Cartype::find($id);
        return view('intranet.cartype.show', compact('Carmodel'));
    }

    public function create(){
        return view('intranet.cartype.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $last = Cartype::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Cartype::create($data);
        if($insert) return Redirect::route('intranet.indexCartype')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $cartype = Cartype::find($id);
        return view('intranet.cartype.edit', compact('cartype'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Cartype::find($id)->update($data);
        return Redirect::route('intranet.indexCartype')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Cartype::find($id)->delete();
        return Redirect::route('intranet.indexCartype')->with('success', 'Suppression effectuée avec succès');
    }
}