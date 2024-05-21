@extends('layouts.dashboard')

@section('title', 'Shortest Path Results')

@section('content')
<div class="content-header">
    <h2>Shortest Path Results</h2>
</div>
<div class="content-body">
    @if (isset($results))
        <p><b>Shortest Path:</b></p>
        <ul>
            @foreach ($results['shortest_path'] as $node)
                <li>{{ $node['name'] ?? $node['id'] }}</li>
            @endforeach
        </ul>

        <p><b>Total Distance:</b> {{ $results['total_distance'] }}</p>
        <p><b>Total Time:</b> {{ $results['total_time'] }}</p>
        <p><b>Total Stops Explored:</b> {{ $results['total_stops_explored'] }}</p>
        <p><b>Execution Time:</b> {{ $results['execution_time'] }}</p>
        <p><b>Closest Stop From Start:</b> {{ $results['closest_stop_from_start']['name'] ?? $results['closest_stop_from_start']['id'] }}</p>
        <p><b>Closest Stop To End:</b> {{ $results['closest_stop_to_end']['name'] ?? $results['closest_stop_to_end']['id'] }}</p>
    @else
        <p>No results found.</p>
    @endif
</div>
@endsection
