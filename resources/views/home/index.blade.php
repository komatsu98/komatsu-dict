@extends('layouts.master')

@section('content')
    @if(isset($words) && count($words))
        <p class="text-center">Search for "<span style="font-weight: bold">{{$search}}</span>"...</p>
        {{--<hr class="text-center" style="width: 50%">--}}
        <ul>
            @foreach($words as $word)
                <a href="/words/{{ $word->id }}">
                    <li>{{ $word->word }}</li>
                </a>
            @endforeach
        </ul>
        <hr class="text-center" style="width: 50%">

    @elseif(isset($words) && !count($words))
        <p class="text-center">Search for "<span style="font-weight: bold">{{$search}}</span>"...</p>
        <p class="ml-3"><i>nothing</i></p>
        <hr class="text-center" style="width: 50%">
    @endif

    {{--****************** for translations *****************--}}

    {{--@if(isset($translations) && count($translations))--}}
    {{--<p>Kết quả tìm kiếm cho bài dịch...</p>--}}
    {{--<ul>--}}
    {{--@foreach($translations as $translation)--}}
    {{--<a href="/translations/{{ $translation->id }}">--}}
    {{--<li>{{ $translation->title }}</li>--}}
    {{--</a>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--<hr>--}}
    {{--@elseif(isset($translations) && !count($translations))--}}
    {{--<p class="text-center">Search for "<span style="font-weight: bold">{{$search}}</span>"...</p>--}}
    {{--<p class="ml-3"><i>nothing</i></p>--}}
    {{--@endif--}}

    <p class="text-center font-weight-light" style="font-size: 4rem">
        Welcome!
    </p>

@endsection

