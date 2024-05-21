<?php
//namespace App\Services;
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ShortestPathService
{
    public static function calculateShortestPath($sourceLat, $sourceLng, $destLat, $destLng)
    {
        // Make HTTP request to your API to calculate the shortest path
        $response = Http::post('http://localhost:8001/api/calculate-shortest-path', [
            'source_lat' => $sourceLat,
            'source_lng' => $sourceLng,
            'dest_lat' => $destLat,
            'dest_lng' => $destLng,
        ]);

        // Check if request was successful and return the result
        if ($response->successful()) {
            return $response->json(); // Assuming API returns JSON
        } else {
            return "Error: Unable to calculate the shortest path."; // Handle error condition
        }
    }
}
