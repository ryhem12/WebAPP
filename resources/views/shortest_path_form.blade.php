@extends('layouts.dashboard')

@section('title', 'Calculate Shortest Path')

@section('content')
<div class="content-header">
    <h2>Calculate Shortest Path</h2>
</div>
<div class="content-body">
    <form method="POST" action="{{ route('calculate-shortest-path') }}" class="shortest-path-form">
        @csrf
        <div class="form-group">
            <div class="form-item">
                <label for="start_latitude">Source Latitude:</label>
                <input type="text" name="start_latitude" id="start_latitude" placeholder="Enter source latitude" value="{{ old('start_latitude') }}">
            </div>
            <div class="form-item">
                <label for="start_longitude">Source Longitude:</label>
                <input type="text" name="start_longitude" id="start_longitude" placeholder="Enter source longitude" value="{{ old('start_longitude') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="form-item">
                <label for="end_latitude">Destination Latitude:</label>
                <input type="text" name="end_latitude" id="end_latitude" placeholder="Enter destination latitude" value="{{ old('end_latitude') }}">
            </div>
            <div class="form-item">
                <label for="end_longitude">Destination Longitude:</label>
                <input type="text" name="end_longitude" id="end_longitude" placeholder="Enter destination longitude" value="{{ old('end_longitude') }}">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Calculate Shortest Path</button>
        </div>
    </form>

    @if (isset($results))
    <div class="results-container">
        <h3>Closest Stops</h3>
        <p><b>Closest Stop From Start:</b> {{ $results['closest_stop_from_start']['name'] ?? $results['closest_stop_from_start']['id'] }}
        <b>Closest Stop To End:</b> {{ $results['closest_stop_to_end']['name'] ?? $results['closest_stop_to_end']['id'] }}</p>

        <div class="results-and-map">
            <div class="results" style="height: 350px; overflow-y: auto;">
                <h3>Shortest Path Results</h3>
                <ul>
                    @foreach ($results['shortest_path'] as $node)
                        <li>{{ $node['name'] ?? $node['id'] }}</li>
                    @endforeach
                </ul>
                <p><b>Total Distance:</b> {{ $results['total_distance'] }}</p>
                <p><b>Total Time:</b> {{ $results['total_time'] }}</p>
            </div>
            <div id="map" style="height: 340px;"></div>
        </div>
    </div>
    @endif
</div>

<style>
    .shortest-path-form .form-group {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .shortest-path-form .form-item {
        display: flex;
        flex-direction: column;
        width: 48%;
    }

    .shortest-path-form label {
        margin-bottom: 5px;
    }

    .shortest-path-form input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .results-and-map {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .results {
        width: 48%;
    }

    #map {
        width: 48%;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (isset($results))
        var map = L.map('map').setView([{{ $results['closest_stop_from_start']['latitude'] }}, {{ $results['closest_stop_from_start']['longitude'] }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var startIcon = L.icon({
            iconUrl: '/images/red-pin.png', // replace with the URL to your red pin icon
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        });

        var endIcon = L.icon({
            iconUrl: '/images/blue-pin.png', // replace with the URL to your blue pin icon
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        });

        var busStopIcon = L.icon({
            iconUrl: '/images/bus-stop-icon.png', // replace with the URL to your bus stop icon
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        });

        var tramwayStationIcon = L.icon({
            iconUrl: '/images/tramway-station-icon.png', // replace with the URL to your tramway station icon
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        });

        var startMarker = L.marker([{{ $results['closest_stop_from_start']['latitude'] }}, {{ $results['closest_stop_from_start']['longitude'] }}], {icon: startIcon}).addTo(map);
        var endMarker = L.marker([{{ $results['closest_stop_to_end']['latitude'] }}, {{ $results['closest_stop_to_end']['longitude'] }}], {icon: endIcon}).addTo(map);

        var latlngs = [
            [{{ $results['closest_stop_from_start']['latitude'] }}, {{ $results['closest_stop_from_start']['longitude'] }}],
            @foreach ($results['shortest_path'] as $node)
                [{{ $node['latitude'] }}, {{ $node['longitude'] }}],
            @endforeach
            [{{ $results['closest_stop_to_end']['latitude'] }}, {{ $results['closest_stop_to_end']['longitude'] }}]
        ];

        L.polyline(latlngs, {color: 'blue'}).addTo(map);

        @foreach ($results['shortest_path'] as $node)
            var iconUrl = '{{ strpos($node['name'], 'bus stop') !== false ? 'images/bus-stop-icon.png' : 'images/tramway-station-icon.png' }}';

            var icon = L.icon({
                iconUrl: iconUrl,
                iconSize: [25, 25],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            L.marker([{{ $node['latitude'] }}, {{ $node['longitude'] }}], {icon: icon}).addTo(map);
        @endforeach
        @endif
    });
</script>
@endsection
