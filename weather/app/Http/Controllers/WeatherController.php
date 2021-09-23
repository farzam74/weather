<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $request=$request->get('city');

        $coord=Http::get('api.openweathermap.org/data/2.5/weather', [
            'q' => $request,
            'appid' => '8516dbc0b619c1a5b25dc01f1ce492b1',
            'units' => 'metric'
        ])->json();

        $lat=$coord['coord']['lat'];
        $lon=$coord['coord']['lon'];

        $city=$coord['name'];

        $weather=Http::get('https://api.openweathermap.org/data/2.5/onecall',[
            'lat' => $lat,
            'lon' => $lon,
            'units' => 'metric',
            'appid' => '8516dbc0b619c1a5b25dc01f1ce492b1'
        ]);


        
        return $weather;

       return view('index',compact('city','weather'));




    }
}
