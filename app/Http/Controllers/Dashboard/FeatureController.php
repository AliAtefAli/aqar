<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\StoreFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Models\FeatureTranslation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::with('translation')
            ->paginate();

        return view('dashboard.features.index', compact('features'));
    }

    public function create()
    {
        return view('dashboard.features.create');
    }

    public function store(StoreFeatureRequest $request)
    {
        Feature::create($request->validated());

        return redirect()->route('dashboard.features.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function edit(Feature $feature)
    {
        return view('dashboard.features.edit', compact('feature'));
    }


    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $feature->update($request->validated());

        return redirect()->route('dashboard.features.index')->with('success', trans('dashboard.It was done successfully!'));

    }


    public function destroy(Feature $feature)
    {
        $feature_translations = FeatureTranslation::where('feature_id' ,$feature->id)->get();
        if (!empty($feature_translations)){
            foreach ($feature_translations as $feature_translation){
                $feature_translation->delete();
            }
        }
        $feature->delete();
        return redirect()->route('dashboard.features.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
