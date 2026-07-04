<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class ClimaController extends Controller
{
    public function index()
    {
        $apiKey = env('WEATHER_API_KEY');

        $response = Http::get(
            'http://api.weatherapi.com/v1/forecast.json',
            [
                'key' => $apiKey,
                'q' => 'Zapopan',
                'days' => 1,
                'aqi' => 'no',
                'alerts' => 'no'
            ]
        );

        $data = $response->json();

        return view('clima.index', compact('data'));
    }
}