<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\User;
use Config;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(config('app.paginate'));
        $numberOrders = count(Order::all());

        return view('order.list_order', compact('orders', 'numberOrders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        return view('order.add_order', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $order = Order::create($request->all());

        return redirect('orders')->with('message', trans('language.message_add_order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();

        return view('order.edit_order', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, $id)
    {
        $order = Order::findOrFail($id)->update($request->all());

        return redirect('orders')->with('message', trans('language.message_edit_order'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id)->delete();

        return redirect('orders')->with('message', trans('language.message_delete_order'));
    }

    public function getOrdersById($id)
    {
        $allOrders = Order::where('user_id', $id)->orderBy('created_at', 'DESC');
        $numberOrders = $allOrders->count();
        $orders = $allOrders->paginate(config('app.paginate'));
        $userEmail = User::findOrFail($id)->email;

        return view('order.list_order', compact('orders', 'numberOrders', 'userEmail'));
    }
}
