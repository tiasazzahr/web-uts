<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\CriteriaWeight;
use App\Models\CriteriaRating;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::get();
        return view('alternative.index', compact('alternatives'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criteriaweights = CriteriaWeight::get();
        return view('alternative.create', compact('criteriaweights'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kalori' => 'required',
            'protein' => 'required',
            'karbohidrat' => 'required',
            'lemak' => 'required',
            'gizi' => 'required',
        ]);

        // Save the alternative
        $alt = new Alternative;
        $alt->nama = $request->nama;
        $alt->kalori = $request->kalori;
        $alt->protein = $request->protein;
        $alt->karbohidrat = $request->karbohidrat;
        $alt->lemak = $request->lemak;
        $alt->gizi = $request->gizi;
        $alt->save();

        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit(Alternative $alternative)
    {
        return view('alternative.edit', compact('alternative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alternative $alternative)
    {
        $request->validate([
            'nama' => 'required',
            'kalori' => 'required',
            'protein' => 'required',
            'karbohidrat' => 'required',
            'lemak' => 'required',
            'gizi' => 'required',
        ]);

        // Save the alternative
        $alternative->nama = $request->nama;
        $alternative->kalori = $request->kalori;
        $alternative->protein = $request->protein;
        $alternative->karbohidrat = $request->karbohidrat;
        $alternative->lemak = $request->lemak;
        $alternative->gizi = $request->gizi;
        $alternative->save();

        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alternative $alternative)
    {
        // $alternative = Alternative::where('alternative_id', $alternative->id)->delete();
        $alternative->delete();

        return redirect()->route('alternatives.index')
            ->with('success', 'Alternative deleted successfully');
    }
}
