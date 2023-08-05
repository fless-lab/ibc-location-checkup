<?php

namespace App\Http\Controllers\intranet;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class MarkController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $marks = Mark::orderBy('created_at', 'desc')->get();
        return view('intranet.mark.list', compact('marks'));
    }

    public function show($id){
        $mark = Mark::find($id);
        return view('intranet.mark.show', compact('mark'));
    }

    public function create(){
        return view('intranet.mark.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $last = Mark::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;
        $insert = Mark::create($data);
        if($insert) return Redirect::route('intranet.indexMark')->with('success', 'L\'état a été bien crée.');
        return;
    }

    public function edit($id){
        $mark = Mark::find($id);
        return view('intranet.mark.edit', compact('mark'));
    }

    public function update($id, Request $request){
        $data = $request->all();
        Mark::find($id)->update($data);
        return Redirect::route('intranet.indexMark')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        Mark::find($id)->delete();
        return Redirect::route('intranet.indexMark')->with('success', 'Suppression effectuée avec succès');
    }

}
