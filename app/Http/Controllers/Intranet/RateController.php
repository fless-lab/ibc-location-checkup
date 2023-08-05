<?php

namespace App\Http\Controllers\Intranet;
use App\Models\Rate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class RateController extends Controller
{
    public function __construct(){

    }

    public function edit(){
        $rate = Rate::find(1);
        return view('intranet.rate.edit', compact('rate'));
    }

    public function update(Request $request){
        $data = $request->all();
        Rate::find(1)->update($data);

        return Redirect::route('intranet.editRate')->with('success', 'Modification effectuée avec succès');
    }

}