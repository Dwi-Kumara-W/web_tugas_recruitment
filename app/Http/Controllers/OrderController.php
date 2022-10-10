<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index(Request $request){
        $keyword = $request->keyword;

        $order = Order::where('target', 'LIKE', '%'.$keyword.'%')
                    ->paginate(10);

        return view('order', ['orders' =>$order]);

    }

    public function create()
    {
        return view('order-add');
    }

    public function store(Request $request)
    {


        $order = Order::create($request->all());

        if($order){
            Session::flash('status', 'success');
            Session::flash('message', 'add new device success!');
        }

        return redirect('/orders');

    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        return view('order-delete', ['order' => $order]);
    }

    public function destroy($id)
    {
        $orderDelete = Order::findOrFail($id);
        $orderDelete->delete();

        if($orderDelete){
            Session::flash('status', 'success');
            Session::flash('message', 'delete student success!');
        }

        return redirect('/orders');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order-edit', ['order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrfail($id);

        $order->update($request->all());

        return redirect('/orders');

    }
}
