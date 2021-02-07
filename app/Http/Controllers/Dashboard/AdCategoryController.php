<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdCategoryRequest;
use App\Http\Requests\UpdateAdCategoryRequest;
use App\Models\AdCategory;
use App\Models\AdCategoryTranslation;
use Astrotomic\Translatable\Translatable;
use Illuminate\Http\Request;

class AdCategoryController extends Controller
{
    public function index()
    {
        $categories = AdCategory::with('translation')
            ->paginate();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = AdCategory::all();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(StoreAdCategoryRequest $request)
    {
        AdCategory::create($request->validated());

        return redirect()->route('dashboard.adCategories.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function show(AdCategory $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }


    public function edit(AdCategory $adCategory)
    {
        return view('dashboard.categories.edit', compact('adCategory'));
    }


    public function update(UpdateAdCategoryRequest $request, AdCategory $adCategory)
    {
        $adCategory->update($request->validated());

        return redirect()->route('dashboard.adCategories.index')->with('success', trans('dashboard.It was done successfully!'));

    }


    public function destroy(AdCategory $adCategory)
    {
        $category_translations = AdCategoryTranslation::where('ad_category_id' ,$adCategory->id)->get();
        if (!empty($category_translations)){
            foreach ($category_translations as $category_translation){
                $category_translation->delete();
            }
        }
        $adCategory->delete();
        return redirect()->route('dashboard.adCategories.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
