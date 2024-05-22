<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Connection;
use App\Models\Stop;

class ConnectionController extends Controller
{
    public function index(){
        $connections = Connection::all();
        return view('connections.index', compact('connections'));
    }

    public function create(){
        $stops = Stop::all();
        return view('connections.create', compact('stops'));
    }

    public function store(Request $request){
        $request->validate([
            'from_stop_id' => 'required|exists:stops,id',
            'to_stop_id' => 'required|exists:stops,id',
            'time' => 'required|numeric',
            'distance' => 'required|numeric',
        ]);

        Connection::create($request->all());

        return redirect()->route('connections.index')->with('success', 'Connection created successfully.');
    }

    public function edit(Connection $connection){
        $stops = Stop::all();
        return view('connections.edit', compact('connection', 'stops'));
    }

    public function update(Request $request, Connection $connection){
        $request->validate([
            'from_stop_id' => 'required|exists:stops,id',
            'to_stop_id' => 'required|exists:stops,id',
            'time' => 'required|numeric',
            'distance' => 'required|numeric',
        ]);

        $connection->update($request->all());

        return redirect()->route('connections.index')->with('success', 'Connection updated successfully.');
    }

    public function destroy(Connection $connection){
        $connection->delete();

        return redirect()->route('connections.index')->with('success', 'Connection deleted successfully.');
    }
}

