@extends('layouts.master')

@section('content')

    <h1>Edit Translation</h1>
    <form method="POST" action="/user/updates/{{ $update->id }}">

        @csrf
        {{ method_field('PUT') }}

        <h3 class="d-flex justify-content-between pr-2 pl-2" style="background: #4577bf; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
            <div class="mt-auto mb-auto pl-2 white">
                <i class="far fa-copy"></i>

                    <span style="font-size: 1.5rem"><b>{{ $update->word->word }}</b></span> <span><i
                                style="font-size: 0.9rem">({{ $update->word->form->name }})</i></span>

            </div>
        </h3>

        @include('update.form')

        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @include('layouts.errors')

    </form>

@endsection

