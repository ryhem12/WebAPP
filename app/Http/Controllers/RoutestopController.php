<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routestop;
use App\Models\Route;
use App\Models\Stop;

class RoutestopController extends Controller
{
    public function index(){
        $routestops = Routestop::all();
        return view('routestops.index', compact('routestops'));
    }

    public function create(){
        $routes = Route::all();
        $stops = Stop::all();
        return view('routestops.create', compact('routes', 'stops'));
    }

    public function store(Request $request){
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'stop_id' => 'required|exists:stops,id',
            'sequence' => 'required|numeric',
        ]);

        Routestop::create($request->all());

        return redirect()->route('routestops.index')->with('success', 'Route Stop created successfully.');
    }

    public function edit(Routestop $routestop){
        $routes = Route::all();
        $stops = Stop::all();
        return view('routestops.edit', compact('routestop', 'routes', 'stops'));
    }

    public function update(Request $request, Routestop $routestop){
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'stop_id' => 'required|exists:stops,id',
            'sequence' => 'required|numeric',
        ]);

        $routestop->update($request->all());

        return redirect()->route('routestops.index')->with('success', 'Route Stop updated successfully.');
    }

    public function destroy(Routestop $routestop){
        $routestop->delete();

        return redirect()->route('routestops.index')->with('success', 'Route Stop deleted successfully.');
    }
}

