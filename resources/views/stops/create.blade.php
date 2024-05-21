@extends('layouts.dashboard')

@section('title', 'Create Stop')

@section('content')
<div class="content-header">
    <h2>Create Stop</h2>
</div>
<div class="content-body">
    <form method="POST" action="{{ route('stop.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div>
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" placeholder="Longitude">
        </div>
        <div>
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" placeholder="Latitude">
        </div>
        <div>
            <input type="submit" value="Save a new stop" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
