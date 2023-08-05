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


class UserController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $users = User::where('type', null)->orderBy('created_at', 'desc')->get();
        return view('intranet.user.list', compact('users'));
    }

    public function show($id){
        $user = User::find($id);
        return view('intranet.user.show', compact('user'));
    }

    public function create(){
        return view('intranet.user.create');
    }

    public function store(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);
        }else{
            $data['photo'] = 'avatar.png';
        }

        $last = User::orderBy('created_at', 'desc')->first();
        if($last) $data['id'] = $last->id + 1;
        else $data['id'] = 1;

        $insert = User::create($data);
        if($insert) return Redirect::route('intranet.indexUser')->with('success', 'Création effectuée avec succès.');
        return;
    }

    public function edit($id){
        $user = User::find($id);
        return view('intranet.user.edit', compact('user'));
    }

    public function update($id, Request $request){
        $data = is_null($request->get('password')) ? $request->except('password') : $request->all();

        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);        }

        User::find($id)->update($data);

        return Redirect::route('intranet.indexUser')->with('success', 'Modification effectuée avec succès');
    }

    public function delete($id){
        User::find($id)->delete();
        return Redirect::route('intranet.indexUser')->with('success', 'Suppression effectuée avec succès');
    }

    public function toggleActive(Request $request){
        $user = User::find($request->get('id'));
        $data['active'] = !$user['active'];
        $user->update($data);
        return $user;
    }

}