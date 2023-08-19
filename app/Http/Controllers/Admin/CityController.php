<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
 
    public function index()
    {
        $data = City::all();

        return view('admin.cities.index', compact('data'));
    }

    public function create()
    {
       return view('admin.cities.create',['title'=>_('admin.title.cities.create')];
    }

   
    public function store(Request $request)
    {
        City::create($request->validate($this->rules));

        return redirect()->route('admin.cities.index')->with(['succes'=>_('admin.success.create')]);
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(City $city, Request $request)
    {
        $city->update($request->validate($this->rules));

        return redirect()->route('admin.cities.index')->with(['success' => _('admin.success.update')]);
    }

    public function destroy(string $id)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')->with(['success' => _('admin.success.destroy')]);
    }

    private array $rules = [
        'name' => ['required', 'string'],
        'region' => ['required', 'string'],
    ];
}
