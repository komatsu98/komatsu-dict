@extends('layouts.master')

@section('content')
    @if(isset($seach))
        <h2>{{ $search }} . . .</h2>
    @endif

    @if(isset($words) && count($words))
        <p class="text-center">Search for "<span style="font-weight: bold">{{$search}}</span>"...</p>
        <ul>
            @foreach($words as $word)
                <a href="/words/{{ $word->id }}">
                    <li>{{ $word->word }}</li>
                </a>
            @endforeach
        </ul>
        <hr>
    @endif

    @if(isset($translations) && count($translations))
        <p>Kết quả tìm kiếm cho bài dịch...</p>
        <ul>
            @foreach($translations as $translation)
                <a href="/translations/{{ $translation->id }}">
                    <li>{{ $translation->title }}</li>
                </a>
            @endforeach
        </ul>
        <hr>
    @endif

    <p class="text-center font-weight-light" style="font-size: 4rem">
        Welcome!
    </p>

@endsection

