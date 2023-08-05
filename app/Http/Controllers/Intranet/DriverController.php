<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class DriverController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $drivers = Driver::orderBy('created_at', 'desc')->get();
        return view('intranet.driver.list', compact('drivers'));
    }

    public function show($id){
        $driver = Driver::find($id);
        return view('intranet.driver.show', compact('driver'));
    }

    public function create(){
        return view('intranet.driver.create');
    }

    public function store(Request $request){
        $data = $request->all();

        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }else{
            $data['photo'] = 'avatar.png';
        }

        $last = Driver::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = Driver::create($data);
        if($insert) return Redirect::route('intranet.indexDriver')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $driver = Driver::find($id);
        return view('intranet.driver.edit', compact('driver'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }

        Driver::find($id)->update($data);

        return Redirect::route('intranet.indexDriver')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Driver::find($id)->delete();
        return Redirect::route('intranet.indexDriver')->with('success', 'Suppression effectuée avec succès');
    }

}