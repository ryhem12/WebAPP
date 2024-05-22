<div class="sidebar">
    <div class="sidebar-header">
        <h3>DzaiRoads</h3>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ route('dashboard') }}"><i class="lni lni-home"></i> Home</a></li>
        <li><a href="{{ route('routes.index') }}"><i class="lni lni-road"></i> Routes</a></li>
        <li><a href="{{ route('stop.index') }}"><i class="lni lni-map-marker"></i> Stops</a></li>
        <li><a href="{{ route('connections.index') }}"><i class="lni lni-link"></i> Connections</a></li>
        <li><a href="{{ route('routestops.index') }}"><i class="fa-solid fa-map-location-dot"></i> Route Stops</a></li>
        <li><a href="{{ route('shortest-path-form') }}"><i class="fas fa-route"></i> Find Path</a></li>
        <li><a href="{{ route('logout') }}"><i class="lni lni-exit"></i> Logout</a></li>
    </ul>
</div>
