@extends('layouts.master')

@section('content')
    <div class="form-group">
        @if(!auth()->id())
            <button type="button" class="btn btn-primary disabled">Đăng nhập để thêm bài viết!</button>
        @else
            <a href="/user/translations/create">
                <button type="button" class="btn btn-primary">Thêm bài</button>
            </a>
        @endif
    </div>

    <hr>
    @foreach($sources as $source)
        @foreach($source->translations as $translation)
            <a href="/translations/{{ $translation->id }}">
                <li>{{ $translation->source->title }}</li>
            </a>
        @endforeach
    @endforeach
@endsection
