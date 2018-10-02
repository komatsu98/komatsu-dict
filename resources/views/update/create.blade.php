@extends('layouts.master')

@section('content')

    <h1>Create an Update</h1>
    <hr>
    <form method="POST" action="/user/word/{{ $word->id }}/updates">

        @csrf

        <div class="blogs-post">
            <h2 class="blog-post-title">
                {{ $word->word }} <span><i>({{ $word->form->name }})</i></span>
            </h2>
        </div>

        <div class="form-group">
            <span>Word form: </span>
            <span>{{ $word->form->name }}</span>
        </div>

        @include('update.form')

        <button class="btn btn-primary ml-auto" type="button" id="add_field">Add field - meaning</button>

        <br>
        <br>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @include('layouts.errors')

    </form>

@endsection
