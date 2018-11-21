@extends('layouts.master')

@section('content')
    <h1>Register</h1>

    <form method="POST" action="/register">

        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="student_id">Student Id:</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

        @include('layouts.errors')
    </form>
@endsection