@extends('layouts.master')

@section('content')
    <h2 class=" ml-3">
        Danh sách thành viên
    </h2>
    <ol>
        @foreach($users as $user)
            <li>
                <a class="pr-4 border-right" href="/admin/users/{{$user->id}}">{{$user->name}}</a>
                <span class="pr-2 pl-2 border-right" >{{count($user->word_updates)}} <i class="far fa-copy"></i></span>
                <span class="pr-2 pl-2 border-right" >{{$user->count_rates()['uprate']}} <i class="fas fa-star star-up"></i> </span>
                <span > {{$user->count_rates()['uprate']}} <i class="fas fa-long-arrow-alt-up"></i></span>
            </li>
        @endforeach
    </ol>
@endsection
