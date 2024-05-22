@extends('layouts.dashboard')

@section('title', 'Create Route Stop')

@section('content')
<div class="content-header">
    <h2>Create Route Stop</h2>
</div>
<div class="content-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('routestops.store') }}">
        @csrf
        <div class="form-group">
            <label for="route_id">Route</label>
            <select name="route_id" id="route_id" class="form-control" required>
                @foreach($routes as $route)
                    <option value="{{ $route->id }}">{{ $route->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="stop_id">Stop</label>
            <select name="stop_id" id="stop_id" class="form-control" required>
                @foreach($stops as $stop)
                    <option value="{{ $stop->id }}">{{ $stop->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="sequence">Sequence</label>
            <input type="number" name="sequence" id="sequence" class="form-control" value="{{ old('sequence') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<style>
    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input, .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #4d5346;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
@endsection
