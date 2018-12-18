@extends('layouts.master')

@section('content')
    <h2 class=" ml-3">
        Danh sách từ vựng
    </h2>
    @if(count($words))
        <ol start="{{((int)(request('page')-1)) * 15 + 1}}">
            @foreach($words as $word)
                <li>
                    <a href="/admin/words/{{ $word->id }}">
                        {{ $word->word }} <span><i>({{ $word->form->name }})</i></span>
                    </a>
                    <span class="ml-2">[ <b>{{count($word->updates)}}</b> <i class="far fa-copy"></i> ]</span>
                </li>
            @endforeach
        </ol>

    @endif

    {{ $words->links() }}
@endsection
