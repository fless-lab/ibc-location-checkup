<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $categorys = Category::orderBy('created_at', 'desc')->get();
        return view('intranet.category.list', compact('categorys'));
    }

    public function show($id){
        $category = Category::find($id);
        return view('intranet.category.show', compact('Carmodel'));
    }

    public function create(){
        return view('intranet.category.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $last = Category::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Category::create($data);
        if($insert) return Redirect::route('intranet.indexCategory')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $category = Category::find($id);
        return view('intranet.category.edit', compact('category'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Category::find($id)->update($data);
        return Redirect::route('intranet.indexCategory')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Category::find($id)->delete();
        return Redirect::route('intranet.indexCategory')->with('success', 'Suppression effectuée avec succès');
    }
}