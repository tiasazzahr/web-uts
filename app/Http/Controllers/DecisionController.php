<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\CriteriaWeight;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::get();

        $criteriaweights = CriteriaWeight::get();

        return view('decision', compact('alternatives', 'criteriaweights'))->with('i', 0);
    }
}
