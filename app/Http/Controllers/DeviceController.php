<?php

namespace App\Http\Controllers;

use App\Models\Devices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;

        $device = Devices::where('username', 'LIKE', '%'.$keyword.'%')
                    ->paginate(10);

        return view('device', ['devices' =>$device]);

    }

    public function create()
    {
        return view('device-add');
    }

    public function store(Request $request)
    {


        $device = Devices::create($request->all());

        if($device){
            Session::flash('status', 'success');
            Session::flash('message', 'add new device success!');
        }

        return redirect('/devices');

    }

    public function delete($id)
    {
        $device = Devices::findOrFail($id);
        return view('device-delete', ['device' => $device]);
    }

    public function destroy($id)
    {
        $devideDelete = Devices::findOrFail($id);
        $devideDelete->delete();

        if($devideDelete){
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }

        return redirect('/devices');
    }

}
