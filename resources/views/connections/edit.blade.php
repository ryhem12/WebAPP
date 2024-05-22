@extends('layouts.dashboard')

@section('title', 'Edit Connection')

@section('content')
<div class="content-header">
    <h2>Edit Connection</h2>
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
    <form method="POST" action="{{ route('connections.update', $connection) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="from_stop_id">From Stop</label>
            <select name="from_stop_id" id="from_stop_id" class="form-control" required>
                @foreach($stops as $stop)
                    <option value="{{ $stop->id }}" @if($stop->id == $connection->from_stop_id) selected @endif>{{ $stop->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="to_stop_id">To Stop</label>
            <select name="to_stop_id" id="to_stop_id" class="form-control" required>
                @foreach($stops as $stop)
                    <option value="{{ $stop->id }}" @if($stop->id == $connection->to_stop_id) selected @endif>{{ $stop->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="time">Time</label>
            <input type="number" name="time" id="time" class="form-control" value="{{ $connection->time }}" required>
        </div>
        <div class="form-group">
            <label for="distance">Distance</label>
            <input type="number" name="distance" id="distance" class="form-control" value="{{ $connection->distance }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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
