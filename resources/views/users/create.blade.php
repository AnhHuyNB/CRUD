@extends('layout.template')
@section('title', 'Create User - CURD LARAVEL 11')
@section('content')
    <h3>@lang('messages.add_user')</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name">@lang('messages.name')</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ @old('name') }}">
                @error('name')
                    <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">@lang('messages.email')</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ @old('email') }}">
                @error('email')
                    <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">@lang('messages.password')</label>
                <input type="password" name="password" id="password" class="form-control">
                @error('password')
                    <span class="text-danger">{{ $message}}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">@lang('messages.save')</button>
        </form>
@endsection