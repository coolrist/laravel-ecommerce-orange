<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('admin.content.orders', ['orders' => Order::paginate(30)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order) {
        $statuses = Status::where('id', '>', $order->status->id)->orderBy('id')->pluck('name', 'id');
        return view('admin.content.editorder', ['order' => $order, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order) {
        $this->validate($request, ['status' => 'required']);

        $tempStatus = Status::find($request->status);
        if (!$tempStatus || $tempStatus->id <= $order->status->id || $tempStatus->id > $order->status->id + 1) {
            return back()->withErrors(__('admin.editorder.error'));
        }

        $order->status_id = $tempStatus->id;
        $order->update();

        return redirect()->route('orders.index')->with('success_status', __('admin.orders.success_status'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order) {
        //
    }
}
