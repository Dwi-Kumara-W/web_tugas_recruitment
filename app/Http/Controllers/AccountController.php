<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function index(Request $request){
        $keyword = $request->keyword;

        $user = User::with('device')
                    ->where('name', 'LIKE', '%'.$keyword.'%')
                    ->paginate(10);

        return view('account', ['users' =>$user]);

    }

    public function create()
    {
        $device = Devices::select('id', 'username')->get();
        return view('account-add', ['devices' => $device]);
    }

    public function store(Request $request)
    {

        $request['password'] = Hash::make($request->password);
        $register = User::create($request->all());

        if($register){
            Session::flash('status', 'success');
            Session::flash('message', 'add new register success!');
        }

        return redirect('/account');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return view('account-delete', ['user' => $user]);
    }

    public function destroy($id)
    {
        $userDelete = User::findOrFail($id);
        $userDelete->delete();

        if($userDelete){
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }

        return redirect('/account');
    }

}
