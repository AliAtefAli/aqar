<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreGovernorateRequest;
use App\Http\Requests\UpdateGovernorateRequest;
use App\Models\Governorate;
use App\Http\Controllers\Controller;
use App\Models\GovernorateTranslation;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::with('translation')
            ->latest()
            ->get();

        return view('dashboard.governorates.index', compact('governorates'));
    }

    public function create()
    {
        return view('dashboard.governorates.create');
    }

    public function store(StoreGovernorateRequest $request)
    {
        Governorate::create($request->validated());

        return redirect()->route('dashboard.governorates.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function edit(Governorate $governorate)
    {
        return view('dashboard.governorates.edit', compact('governorate'));
    }


    public function update(UpdateGovernorateRequest $request, Governorate $governorate)
    {
        $governorate->update($request->validated());

        return redirect()->route('dashboard.governorates.index')->with('success', trans('dashboard.It was done successfully!'));

    }


    public function destroy(Governorate $governorate)
    {
        if ($governorate->cities->count() > 0) {
            return back()->with('error', trans('dashboard.Governorate.Has Cities'));
        }
        $governorate_translations = GovernorateTranslation::where('governorate_id' ,$governorate->id)->get();
        if (!empty($governorate_translations)){
            foreach ($governorate_translations as $governorate_translation){
                $governorate_translation->delete();
            }
        }
        $governorate->delete();
        return redirect()->route('dashboard.governorates.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
