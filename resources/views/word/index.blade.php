@extends('layouts.master')

@section('content')
    <div class="form-group">
        @if(!auth()->id())
            <button type="button" class="btn btn-primary disabled">Sign In to Add Word</button>
        @else
            <a href="/user/words/create">
                <button type="button" class="btn btn-primary font-weight-bold">Add word <i class="fas fa-plus-circle"></i></button>
            </a>
        @endif
    </div>


    @if(count($words))
        @foreach($words as $word)
            @include('word.word')
        @endforeach
    @endif

    {{ $words->links() }}
@endsection
