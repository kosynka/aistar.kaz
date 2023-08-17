<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $city = City::findOrFail($id);
         return view('admin.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $city = City::findOrFail($id);
        $city->update($request->all());
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('admin.cities.index');
    }
}
