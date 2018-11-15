@extends('layouts.master')

@section('content')

<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/words/{{ $word->id }}">
            {{ $word->word }} <span><i>({{ $word->form->name }})</i></span>
        </a>

    </h2>
    @foreach($word->tags as $tag)
        <span>
             <a href="/words?tag={{ $tag->id }}">
              <button class="btn btn-info">{{ $tag->name }}</button>
             </a>
         </span>
    @endforeach
    @foreach($word->updates as $update)
        <br>
        <p class="blog-post-meta">
            by <b>{{ $update->user->name}}</b> on
            {{ $update->updated_at->diffForHumans() }}
        </p>
        @if($update['field'])
            Theo <b>{{ $update->field }}: </b>
        @endif
        <span>{{ $update->meaning }}</span>

        <hr>
        <li>
            <span>{{ $update->example }}</span>
            <p>Dịch: <i>{{ $update->example_meaning }}</i></p>
        </li>
        <b>Lưu ý:</b>
        <i>
            {{ $update->note }}
        </i>
    @endforeach

</div>

@endsection
