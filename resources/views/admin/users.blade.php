@extends('layouts.master')

@section('content')
    <h2 class=" ml-3">
        Danh sách thành viên
    </h2>

    <form class="form-inline my-2 my-lg-0 pl-3" method="get" action="/admin/users">
        <input class="form-control mr-sm-2" name="user_search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ol class="list">
        @foreach($users as $user)
            <li class="pt-2 pl-2">
                <a class="pr-md-4 pr-2 " href="/admin/users/{{$user->id}}">
                    {{$user->name}}<span> - {{$user->student_id}}</span>
                </a>
                <span class="d-none d-md-inline-block border-left">
                    <span class="pr-2 pl-2 border-right">{{count($user->word_updates)}} <i
                                class="far fa-copy"></i></span>
                <span class="pr-2 pl-2 border-right">{{$user->count_rates()['uprate']}} <i
                            class="fas fa-star star-up"></i> </span>
                <span> {{$user->count_rates()['uprate']}} <i class="fas fa-long-arrow-alt-up"></i></span>
                </span>
            </li>
        @endforeach
    </ol>
@endsection
