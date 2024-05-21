<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stop;

class StopController extends Controller
{
    public function index(){
        
        $stops = Stop::all();
        return view('stops.index', ['stops'=> $stops]);
    }

    public function create(){
        return view('stops.create');
    }
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);
    
        // Create and save a new Stop instance
        Stop::create([
            'name' => $validatedData['name'],
            'longitude' => $validatedData['longitude'],
            'latitude' => $validatedData['latitude'],
        ]);
    
        // Redirect to a specific route after successful creation
        return redirect()->route('stop.index')->with('success', 'Stop created successfully!');
    }
    public function edit(Stop $stop){
return view('stops.edit',['stop' =>$stop]);
    }
    public function update (Stop $stop, Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
        ]);

        $stop->update($validatedData);
        return redirect(route('stop.index'))-> with('success', 'stop updated successfully');
    }
    public function delete (Stop $stop){
        $stop->delete();
        return redirect()->route('stop.index')->with('success', 'Stop deleted successfully!');
    }
}

