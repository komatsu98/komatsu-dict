@extends('layouts.master')

@section('content')

    <h1>Edit Update</h1>
    <hr>
    <form method="POST" action="/user/updates/{{ $update->id }}">

        @csrf
        {{ method_field('PUT') }}


        <div class="blogs-post">
            <h2 class="blog-post-title">
                {{ $update->word->word }} <span><i>({{ $update->word->form->name }})</i></span>
            </h2>
        </div>

        <div class="form-group">
            <span>Word form: </span>
            <span>{{ $update->word->form->name }}</span>
        </div>

        @include('update.form')

        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @include('layouts.errors')

    </form>

@endsection

