<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\Stop;

class DashboardController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        $stops = Stop::all();
        // Fetch algorithm execution data here for the chart
        $algorithmExecutions = $this->getAlgorithmExecutionData();

        return view('dashboard', compact('routes', 'stops', 'algorithmExecutions'));
    }

    private function getAlgorithmExecutionData()
    {
        // Mock data for the algorithm executions chart
        return [
            'Monday' => 5,
            'Tuesday' => 7,
            'Wednesday' => 8,
            'Thursday' => 6,
            'Friday' => 4,
            'Saturday' => 3,
            'Sunday' => 2,
        ];
    }
}
