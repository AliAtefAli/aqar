<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use App\Models\Block;
use App\Models\BlockTranslation;
use App\Models\City;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function index()
    {
        $blocks = Block::with('translation')
            ->latest()
            ->get();

        return view('dashboard.blocks.index', compact('blocks'));
    }

    public function create()
    {
        $cities = City::all();
        return view('dashboard.blocks.create', compact('cities'));
    }

    public function store(StoreBlockRequest $request)
    {
        Block::create($request->validated());

        return redirect()->route('dashboard.blocks.index')->with('success', trans('dashboard.It was done successfully!'));
    }

    public function edit(Block $block)
    {
        $cities = City::all();

        return view('dashboard.blocks.edit', compact('block', 'cities'));
    }


    public function update(UpdateBlockRequest $request, Block $Block)
    {
        $Block->update($request->validated());

        return redirect()->route('dashboard.blocks.index')->with('success', trans('dashboard.It was done successfully!'));

    }


    public function destroy(Block $Block)
    {
        $Block_translations = BlockTranslation::where('Block_id' ,$Block->id)->get();
        if (!empty($Block_translations)){
            foreach ($Block_translations as $Block_translation){
                $Block_translation->delete();
            }
        }
        $Block->delete();
        return redirect()->route('dashboard.blocks.index')->with('success', trans('dashboard.It was done successfully!'));
    }
}
