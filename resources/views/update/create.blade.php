@extends('layouts.master')

@section('content')

    <h1>Create Translation</h1>
    <form method="POST" action="/user/word/{{ $word->id }}/updates">

        @csrf
        <h3 class="d-flex justify-content-between pr-2 pl-2" style="background: #4577bf; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
            <div class="mt-auto mb-auto pl-2 white">
                <i class="far fa-copy"></i>

                <span style="font-size: 1.5rem"><b>{{ $word->word }}</b></span> <span><i
                            style="font-size: 0.9rem">({{ $word->form->name }})</i></span>

            </div>
        </h3>

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
