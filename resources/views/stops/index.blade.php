@extends('layouts.dashboard')

@section('title', 'Stops')

@section('content')
<div class="content-header">
    <h2>Stops</h2>
    <div class="action">
        <a href="{{ route('stop.create') }}" class="btn btn-primary">Create a new stop</a>
    </div>
</div>
<div class="content-body">
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stops as $stop)
                    <tr>
                        <td>{{ $stop->id }}</td>
                        <td>{{ $stop->name }}</td>
                        <td>{{ $stop->longitude }}</td>
                        <td>{{ $stop->latitude }}</td>
                        <td>
                            <a href="{{ route('stop.edit', ['stop' => $stop]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{ route('stop.delete', ['stop' => $stop]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
