@extends('layouts.master')

@section('content')

    @include('word.word')

    <hr>

    {{--<div class="comments">--}}
        {{--@foreach($word->word_update() as $comment)--}}
            {{--@include('dictionary.comment')--}}
        {{--@endforeach--}}
    {{--</div>--}}

    <hr>
    {{--add comment--}}

    {{--<form method="POST" action="/posts/{{ $post->id }}/comments">--}}
        {{--{{ method_field('PATCH') }}--}}

        {{--@csrf--}}

        {{--<div class="form-group">--}}
            {{--<textarea name="body" placeholder="Your comment here" class="form-control"></textarea>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--@if(!auth()->id())--}}
                {{--<div type="" class="btn btn-primary disabled">Sign In to Add Comment</div>--}}
            {{--@else--}}
                {{--<button type="submit" class="btn btn-primary">Add Comment</button>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</form>--}}
    {{--@include('layouts.errors')--}}


@endsection