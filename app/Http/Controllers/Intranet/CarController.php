<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Car;
use App\Models\Carfile;
use App\Models\Carmodel;
use App\Models\Carstate;
use App\Models\Cartype;
use App\Models\Category;
use App\Models\Mark;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class CarController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $cars = Car::orderBy('created_at', 'desc')->get();
        return view('intranet.car.list', compact('cars'));
    }

    public function show($id){
        $car = Car::find($id);
        return view('intranet.car.show', compact('car'));
    }

    public function create(){
        $cartypes = Cartype::all();
        $carmodels = Carmodel::all();
        $carstates = Carstate::all();
        $categories = Category::all();
        $marks = Mark::all();
        return view('intranet.car.create', compact('cartypes', 'carmodels', 'carstates', 'categories', 'marks'));
    }

    public function store(Request $request){
        $data = $request->all();
        $last = Car::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Car::create($data);
        $this->storeImages($request->file('images'), $insert->id);
        if($insert) return Redirect::route('intranet.indexCar')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $car = Car::find($id);
        $cartypes = Cartype::all();
        $carmodels = Carmodel::all();
        $carstates = Carstate::all();
        $categories = Category::all();
        $marks = Mark::all();
        return view('intranet.car.edit', compact('car', 'cartypes', 'carmodels', 'carstates', 'categories', 'marks'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Car::find($id)->update($data);
        $this->updateImages($request->file('images'), $id);
        return Redirect::route('intranet.indexCar')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Car::find($id)->delete();
        return Redirect::route('intranet.indexCar')->with('success', 'Suppression effectuée avec succès');
    }

    public function storeImages($images, $car_id){
        foreach ($images as $image){
            $name = $image->hashName();
            $image->move(public_path('storage/uploads/cars'), $name);
            $last = Carfile::whereRaw('id = (select max(`id`) from carfiles)')->first();
            if($last) $id = $last->id + 1;
            else $id = 1;
            Carfile::create([
                'id' => $id,
                'name' => $name,
                'car_id' => $car_id,
                'path' => $image->path()
            ]);
        }
    }

    public function updateImages($images, $id){
        if(!is_null($images)){
            Carfile::where('car_id', $id)->delete();
            $this->storeImages($images, $id);
        }
    }

    public function toggleActive(Request $request){
        $car = Car::find($request->get('id'));
        $data['active'] = !$car['active'];
        $car->update($data);
        return $car;
    }

    public function toggleAvailable(Request $request){
        $car = Car::find($request->get('id'));
        $data['available'] = !$car['available'];
        $car->update($data);
        return $car;
    }
}