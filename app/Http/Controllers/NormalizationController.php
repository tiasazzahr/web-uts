<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\CriteriaWeight;
use Illuminate\Http\Request;

class NormalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scores = AlternativeScore::select(
            'alternativescore.id as id',
            'alternatives.id as ida',
            'criteriaweight.id as idw',
            'criteriaratings.id as idr',
            'alternatives.nama as nama',
            'criteriaweight.nama as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description')
        ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescore.alternatif_id')
        ->leftJoin('criteriaweight', 'criteriaweight.id', '=', 'alternativescore.criteria_id')
        ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescore.rating_id')
        ->get();

        // duplicate scores object to get rating value later,
        // because any call to $scores object is pass by reference
        // clone, replica, tobase didnt work
        $cscores = AlternativeScore::select(
            'alternativescore.id as id',
            'alternatives.id as ida',
            'criteriaweight.id as idw',
            'criteriaratings.id as idr',
            'alternatives.nama as nama',
            'criteriaweight.nama as criteria',
            'criteriaratings.rating as rating',
            'criteriaratings.description as description')
        ->leftJoin('alternatives', 'alternatives.id', '=', 'alternativescore.alternatif_id')
        ->leftJoin('criteriaweight', 'criteriaweight.id', '=', 'alternativescore.criteria_id')
        ->leftJoin('criteriaratings', 'criteriaratings.id', '=', 'alternativescore.rating_id')
        ->get();



        $alternatives = Alternative::get();

        $criteriaweights = CriteriaWeight::get();

        // Normalization
        foreach($alternatives as $a){
            // Get all scores for each alternative id
            $afilter = $scores->where('ida', $a->id)->values()->all();
            // Loop each criteria
            foreach($criteriaweights as $icw => $cw){
                // Get all rating value for each criteria
                $rates = $cscores->map(function($val) use ($cw){
                    if($cw->id == $val->idw ){
                        return $val->rating;
                    }
                })->toArray();

                // array_filter for removing null value caused by map,
                // array_values for reiindex the array
                $rates = array_values(array_filter($rates));

                if ($cw->type == 'benefit') {
                    $result = $afilter[$icw]->rating / max($rates);
                    $msg = 'rate ' . $afilter[$icw]->rating . ' max ' . max($rates) . ' res ' . $result;
                } elseif ($cw->type == 'cost') {
                    $result = min($rates) / $afilter[$icw]->rating;
                }
                $afilter[$icw]->rating = round($result, 2);
            }
        }

        return view('normalization', compact('scores', 'alternatives', 'criteriaweights'))->with('i', 0);
    }
}

