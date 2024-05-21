@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="content-header">
    <h2>Dashboard</h2>
</div>
<div class="content-body">
    <div class="top-section">
        <div class="routes-table">
            <h3>Routes</h3>
            <table id="routes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($routes as $route)
                    <tr>
                        <td>{{ $route->id }}</td>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->type }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="algorithm-chart">
            <h3>Algorithm Executions This Week</h3>
            <canvas id="algorithmChart"></canvas>
        </div>
    </div>

    <div class="map-container">
        <h3>Stops Map</h3>
        <div id="map"></div>
        <div class="map-key">
            <div class="key-item">
                <img src="{{ asset('images/bus-stop-icon.png') }}" alt="Bus Stop Icon" class="key-icon">
                <span>Bus Stop</span>
            </div>
            <div class="key-item">
                <img src="{{ asset('images/tramway-station-icon.png') }}" alt="Tramway Station Icon" class="key-icon">
                <span>Tramway Station</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Algorithm Executions Chart
    var ctx = document.getElementById('algorithmChart').getContext('2d');
    var algorithmChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($algorithmExecutions)) !!},
            datasets: [{
                label: 'Executions',
                data: {!! json_encode(array_values($algorithmExecutions)) !!},
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Leaflet.js Map
    var map = L.map('map').setView([36.365, 6.6147], 12); // Center the map on a default location

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var stops = {!! json_encode($stops) !!};
    stops.forEach(function(stop) {
        var iconUrl = stop.name.toLowerCase().includes('bus stop') 
            ? '{{ asset('images/bus-stop-icon.png') }}' 
            : '{{ asset('images/tramway-station-icon.png') }}';

        var icon = L.icon({
            iconUrl: iconUrl,
            iconSize: [25, 25],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var marker = L.marker([stop.latitude, stop.longitude], { icon: icon }).addTo(map)
            .bindPopup(stop.name);
    });
});
</script>
@endsection
