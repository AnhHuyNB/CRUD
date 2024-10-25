@extends('layout.template')
@section('title', 'Data User - CURD LARAVEL 11')
@section('content')
    <h1>data table user</h1>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Proses</th>
            </tr>
        </thead>
        <body>
            @foreach ($users as $data)     
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->name}}</td>
                    <td>{{ $data->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', $data->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('users.destroy', $data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
    <a href="{{ route('users.create')}}" class="btn btn-success">ADD</a>
@endsection