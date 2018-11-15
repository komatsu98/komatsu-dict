@extends('layouts.master')

@section('content')

    <h1>Create a Form</h1>
    <hr>
    <form method="POST" action="/user/forms">

        @csrf

        <div class="form-group">
            <label for="name">Word Form</label>
            <input type="text" class="form-control" name="name" placeholder="" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('layouts.errors')

    </form>

@endsection

