@extends('layouts.master')

@section('content')
    <h3 class="pb-3 mb-4 font-italic border-bottom">

        <span class="">
            IP Address:
            <?php
            $ip = trim(shell_exec("dig +short myip.opendns.com @resolver1.opendns.com"));
            echo ("Public IP: ".$ip);
            ?>
            @php
                echo csrf_token();
            @endphp
        </span>
    </h3>

    <div class="form-group">
        @if(!auth()->id())
            <button type="button" class="btn btn-primary disabled">Sign In to Add Word</button>
        @else
            <a href="/user/words/create">
                <button type="button" class="btn btn-primary">Add Word</button>
            </a>
        @endif
    </div>

    <hr>

    @if(count($words))
        @foreach($words as $word)
            @include('word.word')
        @endforeach
    @endif

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>
@endsection
