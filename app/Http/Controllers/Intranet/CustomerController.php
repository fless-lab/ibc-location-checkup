<?php

namespace App\Http\Controllers\Intranet;
use App\Models\User;
use App\Models\Car;
use App\Models\Carfile;
use App\Models\Carmodel;
use App\Models\Carstate;
use App\Models\Cartype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class CustomerController extends Controller
{
    public function __construct(){

    }

    public function index($type){
        if($type == 'physical')
            $customers = User::where('type', 'physical')->orderBy('created_at', 'desc')->get();
        else
            $customers = User::where('type', 'moral')->orderBy('created_at', 'desc')->get();

        return view('intranet.customer.list', compact('customers', 'type'));
    }

    public function show($id, $type){
        $customer = User::find($id);
        return view('intranet.customer.show', compact('customer', 'type'));
    }

    public function create($type){
        return view('intranet.customer.create', compact('type'));
    }

    public function store($type, Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $data['role'] = 'standard';
        $data['type'] = $type;

        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }

        $last = User::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = User::create($data);
        if($insert) return Redirect::route('intranet.indexCustomer', $type)->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id, $type){
        $customer = User::find($id);
        return view('intranet.customer.edit', compact('customer', 'type'));
    }

    public function update($id, $type, Request $request){
        $data = is_null($request->get('password')) ? $request->except('password') : $request->all();

        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }

        User::find($id)->update($data);

        return Redirect::route('intranet.indexCustomer', $type)->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id, $type){
        User::find($id)->delete();
        return Redirect::route('intranet.indexCustomer', $type)->with('success', 'Suppression effectuée avec succès');
    }

}