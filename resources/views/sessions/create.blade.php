@extends('layouts.master')

@section('content')
    <h1>Sign In</h1>

    <form method="POST" action="/login">

        @csrf

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sign In</button>
        </div>

        @include('layouts.errors')
    </form>
@endsection