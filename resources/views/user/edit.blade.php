@extends('layouts.master')

@section('content')

    <h1>Edit profile</h1>
    <form method="POST" action="/user/profile/{{ $user->id }}">

        @csrf
        {{ method_field('PUT') }}

        <div id="fields">
            <div class="form-group row">
                <div class="col-12">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder=""
                           value="{{$user ? $user->name : ''}}">
                </div>
                <div class="col-12 mt-3">
                    <label for="student_id">Student Id</label>
                    <input type="text" class="form-control" name="student_id" placeholder=""
                           value="{{$user ? $user->student_id : ''}}">
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @include('layouts.errors')

    </form>

@endsection

