<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxResourceController extends Controller
{
    public function getCountries(Request $request)
    {
        $arrData = array();
    
        $countries = DB::table('countries')
            ->orderBy('countries.name', 'asc')
            ->get();

        foreach($countries as $country){
            $arrData[$country->id] = $country->name;
        }

        return response()->json($arrData);
    }

    public function getStates(Request $request)
    {
        $arrData = array();
    
        if($request->country == null || $request->country == ""){
            return response()->json($arrData);
        }
        $states = DB::table('states')
            ->where('states.country_id', '=', $request->country)
            ->orderBy('states.name', 'asc')
            ->get();

        foreach($states as $state){
            $arrData[$state->id] = $state->name;
        }

        return response()->json($arrData);
    }

  
   
}
