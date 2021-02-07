<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use App\Models\CityTranslation;
use App\Http\Controllers\Controller;
use App\Models\Governorate;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('translation')
            ->latest()
            ->get();

        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        return view('dashboard.cities.create', compact('governorates'));
    }

    public function store(StoreCityRequest $request)
    {
        City::create($request->validated());

        return redirect()->route('dashboard.cities.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function edit(City $city)
    {
        $governorates = Governorate::all();

        return view('dashboard.cities.edit', compact('city', 'governorates'));
    }


    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());

        return redirect()->route('dashboard.cities.index')->with('success', trans('dashboard.It was done successfully!'));

    }


    public function destroy(City $city)
    {
        if ($city->blocks->count() > 0) {
            return back()->with('error', trans('dashboard.City.Has blocks'));
        }
        $city_translations = CityTranslation::where('city_id' ,$city->id)->get();
        if (!empty($city_translations)){
            foreach ($city_translations as $city_translation){
                $city_translation->delete();
            }
        }
        $city->delete();
        return redirect()->route('dashboard.cities.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
