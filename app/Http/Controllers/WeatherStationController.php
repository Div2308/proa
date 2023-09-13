<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WeatherStation;
use Illuminate\Http\Request;

class WeatherStationController extends Controller
{
    public function index()
    {
        $stations = WeatherStation::all();
        return view('weather_stations.index', compact('stations'));
    }
}
