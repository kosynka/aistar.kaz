<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $data = City::paginate(25);

        return view('admin.cities.index', compact('data'));
    }

    public function create()
    {
        $city = City::all();

        return view('admin.cities.form', [
            'title' => 'Создание',
            'city' => $city,
            'method' => 'POST',
            'route' => route('cities.store'),
        ]);
    }

    public function store(Request $request)
    {
        City::create($request->validate($this->rules));

        return redirect()->route('cities.index')->with(['success' => 'Город успешно создана']);
    }

    public function edit(City $city)
    {
        $cities = City::all();

        return view('admin.cities.form', [
            'title' => 'Редактирование',
            'city' => $city,
            'cities' => $cities,
            'method' => 'PUT',
            'route' => route('cities.update', $city->id)
        ]);
    }

    public function update(City $city, Request $request)
    {
        $city->update($request->validate($this->rules));

        return redirect()->route('cities.index')->with(['success' => 'Город успешно отредактирована']);
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('products.index')->with(['success' => 'Город успешно удалена']);
    }

    private array $rules = [
        'name' => ['required', 'string', 'min:1'],
        'region' => ['required', 'string', 'min:1'],
    ];
}
