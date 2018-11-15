@extends('layouts.master')

@section('content')
    <div class="blog-post">
        <h3 class="d-flex justify-content-between pr-2 pl-2 mb-3"
            style="background: #4577bf; border-top-right-radius: 0.5rem; border-top-left-radius: 0.5rem">
            <div class="mt-auto mb-auto pl-2 white">
                <i class="far fa-copy"></i>
                <a href="/words/{{ $word->id }}" class="white">
                    <span style="font-size: 1.5rem"><b>{{ $word->word }}</b></span> <span><i
                                style="font-size: 0.9rem">({{ $word->form->name }})</i></span>
                </a>
            </div>


            <div class="mt-auto mb-auto">

                <a href="/user/word/{{ $word->id }}/updates/create" class="white">
                    <div style="font-size: 2rem"><i class="fas fa-plus-circle"></i></div>
                </a>
            </div>
        </h3>


        @foreach($word->getShownUpdates() as $update)

            @include('update.show')

            @if(request()->route()->getName() === "admin_word_detail")
                @include('update.more')
            @endif

        @endforeach
        <div class="">
            @foreach($word->tags as $tag)
                <span>
             <a href="/words?tag={{ $tag->id }}">
              <button class="btn btn-info">{{ $tag->name }}</button>
             </a>
         </span>
            @endforeach
        </div>
    </div>
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

