<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    public function index(){
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    public function create(){
        return view('routes.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        Route::create($request->all());

        return redirect()->route('routes.index')->with('success', 'Route created successfully.');
    }

    public function edit(Route $route){
        return view('routes.edit', compact('route'));
    }

    public function update(Request $request, Route $route){
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $route->update($request->all());

        return redirect()->route('routes.index')->with('success', 'Route updated successfully.');
    }

    public function destroy(Route $route){
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Route deleted successfully.');
    }
}
