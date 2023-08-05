<?php
/**
 * Created by PhpStorm.
 * User: Sir Kov
 * Date: 20/02/2019
 * Time: 10:20
 */

namespace App\Http\Controllers\Extranet;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(){

    }

    public function edit($id, $type){
        $customer = User::find($id);
        return view('extranet.customer.edit', compact('customer', 'type'));
    }

    public function update($id, $type, Request $request){
        $data = is_null($request->get('password')) ? $request->except('password') : $request->all();

        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->hashName();
            $request->file('photo')->move(public_path('storage/uploads/avatars'), $data['photo']);
        }

        User::find($id)->update($data);

        return redirect('/');
    }

}