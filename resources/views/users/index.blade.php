@extends('layout.template')
@section('title', 'Data User - CURD LARAVEL 11')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>@lang('messages.data_table')</h1>
        <div>
            <select class="form-select changeLang" aria-label="Default select example">
                <option value="en" {{ session()->get('locale') == 'en'?'selected':'' }}>English</option>
                <option value="vn" {{ session()->get('locale') == 'vn'?'selected':'' }}>VietNamese</option>
                <option value="cn" {{ session()->get('locale') == 'cn'?'selected':'' }}>Chinaese</option>
            </select>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>@lang('messages.no')</th>
                <th>@lang('messages.name')</th>
                <th>@lang('messages.email')</th>
                <th>@lang('messages.action')</th>
            </tr>
        </thead>
        <body>
            @foreach ($users as $data)     
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $data->name}}</td>
                    <td>{{ $data->email}}</td>
                    <td>
                        <a href="{{ route('users.edit', $data->id) }}" class="btn btn-info">@lang('messages.edit')</a>
                        <form action="{{ route('users.destroy', $data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
    <a href="{{ route('users.create')}}" class="btn btn-success">@lang('messages.add')</a>
@endsection