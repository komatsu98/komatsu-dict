@extends('layouts.master')

@section('content')
    <div class="mb-3">
        <span>Posted by </span>
        <a class="pr-4 border-right" href="/admin/users/{{$user->id}}">{{$user->name}}</a>
        <span class="pr-2 pl-2 border-right">{{count($user->word_updates)}} <i class="far fa-copy"></i></span>
        <span class="pr-2 pl-2 border-right">{{$user->count_rates()['uprate']}} <i
                    class="fas fa-star star-up"></i> </span>
        <span> {{$user->count_rates()['uprate']}} <i class="fas fa-long-arrow-alt-up"></i></span>
    </div>

    @if($user->id === auth()->id())
        <button class="btn btn-info mb-2">
            <a href="/user/profile/{{auth()->id()}}/edit" class="white">Edit profile</a>
        </button>
    @endif

    @foreach($updates as $update)
        <div class="blog-post">
            <h3 class="d-flex justify-content-between pr-2 pl-2" style="background: #4577bf; border-radius: 0.5rem;">
                <div class="mt-auto mb-auto pl-2 white">
                    <i class="far fa-copy"></i>
                    <a href="/words/{{ $update->word->id }}" class="white">
                        <span style="font-size: 1.5rem"><b>{{ $update->word->word }}</b></span> <span><i
                                    style="font-size: 0.9rem">({{ $update->word->form->name }})</i></span>
                    </a>
                </div>
                <div class="mt-auto mb-auto">
                    <a href="/user/word/{{ $update->word->id }}/updates/create" class="white">
                        <div style="font-size: 2rem"><i class="fas fa-plus-circle"></i></div>
                    </a>
                </div>
            </h3>
            <div class="btn-group float-right" role="group" aria-label="Basic example">

            </div>
            @foreach($update->word->tags as $tag)
                <span>
             <a href="/words?tag={{ $tag->id }}">
              <button class="btn btn-info">{{ $tag->name }}</button>
             </a>
         </span>
            @endforeach

            @include('update.show')
        </div>

    @endforeach
@endsection

@push('custom-scripts')
    <script>
        function upvote(id) {
            $.ajax({
                url: "{{ route('home') }}/user/vote/" + id,
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                    is_upvote: 1,
                },
                success:
                    function (f) {
                        data = f;
                        $('#downvote_' + id).css('opacity', '0.2');
                        if ($('#upvote_' + id).css('opacity') === '1') {
                            $('#upvote_' + id).css('opacity', '0.2');
                        } else {
                            $('#upvote_' + id).css('opacity', '1');
                        }
                    },
                error:
                    function (error) {
                        console.log(error);
                    }
            })
        }

        function downvote(id) {
            $.ajax({
                url: "{{ route('home') }}/user/vote/" + id,
                type: "post",
                data: {
                    _token: "{{ csrf_token() }}",
                    is_upvote: 0,
                },
                success:
                    function (f) {
                        data = f;
                        $('#upvote_' + id).css('opacity', '0.2');
                        if ($('#downvote_' + id).css('opacity') === '1') {
                            $('#downvote_' + id).css('opacity', '0.2');
                        } else {
                            $('#downvote_' + id).css('opacity', '1');
                        }
                    },
                error:
                    function (error) {
                        console.log(error);
                    }
            })
        }
    </script>
@endpush