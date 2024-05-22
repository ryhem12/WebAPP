@extends('layouts.dashboard')

@section('title', 'Routes')

@section('content')
<div class="content-header">
    <h2>Routes</h2>
    <a href="{{ route('routes.create') }}" class="btn btn-primary float-right">Create New Route</a>
</div>
<div class="content-body">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <td>{{ $route->id }}</td>
                        <td>{{ $route->name }}</td>
                        <td>{{ $route->type }}</td>
                        <td>
                            <a href="{{ route('routes.edit', $route) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('routes.destroy', $route) }}" method="POST" style="display:inline-block; margin-left: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .table-container {
        max-height: 700px; /* Adjust height as needed */
        overflow-y: auto;
    }

    .table-container::-webkit-scrollbar {
        width: 8px;
    }

    .table-container::-webkit-scrollbar-track {
        background: #f1d4c1; /* SW 6054 */
    }

    .table-container::-webkit-scrollbar-thumb {
        background: #4d5346; /* SW 7730 */
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: #887A6A; /* SW 7702 */
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dddddd;
    }

    th {
        background-color: #4d5346; /* SW 7730 */
        color: white;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .btn-danger {
        margin-left: 10px;
    }
</style>
@endsection
