<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Order::all();

        return view('admin.orders.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Orders = Order::all();

        return view('admin.categories.form', [
            'title' => 'Создание',
            'categories' => $Orders,
            'method' => 'POST',
            'route' => route('Orders.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create($request->validate($this->rules));

        return redirect()->route('Orders.index')->with(['success' => 'Заказ успешно создана']);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $Orders)
    {
        $Orders = Order::all();

        return view('admin.Orders.form', [
            'title' => 'Редактирование',
            'category' => $Orders,
            'categories' => $Orders,
            'method' => 'PUT',
            'route' => route('Orders.update', $Orders->id)
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order $Orders, Request $request)
    {
        $Orders->update($request->validate($this->rules));

        return redirect()->route('categories.index')->with(['success' => 'Заказ успешно отредактирована']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $Orders)
    {
        $Orders->delete();

        return redirect()->route('Orders.index')->with(['success' => 'Заказ успешно удалена']);
    }
}
