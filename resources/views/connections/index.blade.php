@extends('layouts.dashboard')

@section('title', 'Connections')

@section('content')
<div class="content-header">
    <h2>Connections</h2>
    <a href="{{ route('connections.create') }}" class="btn btn-primary float-right">Create New Connection</a>
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
                    <th>From Stop</th>
                    <th>To Stop</th>
                    <th>Time</th>
                    <th>Distance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($connections as $connection)
                    <tr>
                        <td>{{ $connection->id }}</td>
                        <td>{{ $connection->from_stop_id }}</td>
                        <td>{{ $connection->to_stop_id }}</td>
                        <td>{{ $connection->time }}</td>
                        <td>{{ $connection->distance }}</td>
                        <td>
                            <a href="{{ route('connections.edit', $connection) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('connections.destroy', $connection) }}" method="POST" style="display:inline-block; margin-left: 10px;">
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
