<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {

        $request['password'] = Hash::make($request->password);
        $register = User::create($request->all());

        if($register){
            Session::flash('status', 'success');
            Session::flash('message', 'add new register success!');
        }

        return redirect('/login');
    }
}
