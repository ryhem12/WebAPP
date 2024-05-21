@extends('layouts.dashboard')

@section('title', 'Edit Stop')

@section('content')
<div class="content-header">
    <h2>Edit Stop</h2>
</div>
<div class="content-body">
    <form method="POST" action="{{ route('stop.update', ['stop' => $stop]) }}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="Name" value="{{ $stop->name }}">
        </div>
        <div>
            <label for="longitude">Longitude</label>
            <input type="text" name="longitude" placeholder="Longitude" value="{{ $stop->longitude }}">
        </div>
        <div>
            <label for="latitude">Latitude</label>
            <input type="text" name="latitude" placeholder="Latitude" value="{{ $stop->latitude }}">
        </div>
        <div>
            <input type="submit" value="Update" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection
