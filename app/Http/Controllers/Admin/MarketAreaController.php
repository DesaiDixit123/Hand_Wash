<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketArea;
use Illuminate\Http\Request;

class MarketAreaController extends Controller
{
    public function index()
    {
        $areas = MarketArea::all();
        return view('admin.market-areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.market-areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'dealer_count' => 'required|integer|min:0',
            'details' => 'nullable|string|max:255',
        ]);

        MarketArea::create($request->all());

        return redirect()->route('market-areas.index')->with('success', 'Market area created.');
    }

    public function edit($id)
    {
        $area = MarketArea::findOrFail($id);
        return view('admin.market-areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'dealer_count' => 'required|integer|min:0',
            'details' => 'nullable|string|max:255',
        ]);

        $area = MarketArea::findOrFail($id);
        $area->update($request->all());

        return redirect()->route('market-areas.index')->with('success', 'Market area updated.');
    }

    public function destroy($id)
    {
        $area = MarketArea::findOrFail($id);
        $area->delete();
        return redirect()->route('market-areas.index')->with('success', 'Market area deleted.');
    }
}
