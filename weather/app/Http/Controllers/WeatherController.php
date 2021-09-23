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

        $city=$request->get('city');

        $coord=Http::get('api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => '509f45fae59f02c5f7f17c8b3205d8ab',
            'units' => 'metric'
        ])->json();


        $lat=$coord['coord']['lat'];
        $lon=$coord['coord']['lon'];

        $city=$coord['name'];

        $weather=Http::get('api.openweathermap.org/data/2.5/onecall',[
            'lat' => $lat,
            'lon' => $lon,
            'units' => 'metric',
            'appid' => '509f45fae59f02c5f7f17c8b3205d8ab',

        ])->json();

        $icon=Http::get('api.openweathermap.org/data/2.5/weather',[
            'q' => $city,
            'appid' => '509f45fae59f02c5f7f17c8b3205d8ab'
        ])->json()['weather'][0]['icon'];



       return view('index')
           ->with('weather',$weather)
           ->with('city',$city)
           ->with('icon',$icon);



    }
}
