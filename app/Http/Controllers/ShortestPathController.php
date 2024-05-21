<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShortestPathController extends Controller
{
    public function index()
    {
        return view('shortest_path_form');
    }

    public function calculate(Request $request)
    {
        // Make HTTP request to calculate shortest path
        $response = Http::post('http://127.0.0.1:8001/api/calculate-shortest-path', [
            'start_latitude' =>  $request->input('start_latitude'),
            'start_longitude' => $request->input('start_longitude'),
            'end_latitude' => $request->input('end_latitude'),
            'end_longitude' => $request->input('end_longitude'),
        ]);

        // Check if the request was successful
        if ($response->successful()) {
            // Retrieve the result from the response
            $shortestPathResult = $response->json();

            // Pass the result to the view for rendering
            return view('shortest_path_form', ['results' => $shortestPathResult]);
        } else {
            // If the request was not successful, handle the error
            $statusCode = $response->getStatusCode();
            return view('shortest_path_form', ['error' => "API Error: Status Code $statusCode"]);
        }
    }
}
