@extends('layouts.master')

@section('content')
    @if(isset($seach))
        <h2>{{ $search }} . . .</h2>
    @endif

    @if(isset($words) && count($words))
        <p>Kết quả tìm kiếm cho từ vựng...</p>
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

    <ul>
        <li><a href="/words">Dictionary</a></li>
        <li><a href="/translations">Translation</a></li>
    </ul>
@endsection
