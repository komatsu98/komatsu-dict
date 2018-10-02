@extends('layouts.master')

@section('content')

    <h1>Create a Word</h1>
    <hr>
    <form method="POST" action="/user/words">

        @csrf

        <div class="form-group">
            <label for="word">Word</label>
            <input type="text" class="form-control" name="word" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="form">Word Form</label>
            <select class="form-control" name="form_id" placeholder="" required>
                @foreach($forms as $form)
                    <option value={{ $form->id }}> {{ $form->name }} </option>
                @endforeach
            </select>
        </div>

        <div>
            <button id="showForm" class="btn btn-primary"
                    type="button" data-toggle="collapse" data-target="#form" aria-expanded="false"
                    aria-controls="form">
                Add meaning...
            </button>
            <div class="collapse mt-2" id="form">
                @include('update.form')
                <button class="btn btn-primary ml-auto" type="button" id="add_field">Add field - meaning</button>
            </div>
        </div>



        <br>
        <br>

        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" name="tags" placeholder="Cách nhau bởi dấu ','">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <input type="text" class="d-none" id="fields_total" name="fields_total" value="1">

        @include('layouts.errors')

    </form>

@endsection

