<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/words/{{ $word->id }}">
            {{ $word->word }} <span><i>({{ $word->form->name }})</i></span>
        </a>
        <span>
            <a href="/user/word/{{ $word->id }}/updates/create">
                <button type="button" class="btn btn-secondary rounded">+</button>
            </a>
        </span>
    </h2>
    <div class="btn-group float-right" role="group" aria-label="Basic example">

    </div>
    @foreach($word->tags as $tag)
        <span>
             <a href="/words?tag={{ $tag->id }}">
              <button class="btn btn-info">{{ $tag->name }}</button>
             </a>
         </span>
    @endforeach
    @foreach($word->getShownUpdates() as $update)
        <br>
        <hr>

        @include('update.show')

        @if(request()->route()->getName() === "word_detail")
            @include('update.more')
        @endif

    @endforeach

</div>

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
                        $('#upvote_' + id).text(f.upvote);
                        $('#downvote_' + id).text(f.downvote);
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
                        $('#upvote_' + id).text(f.upvote);
                        $('#downvote_' + id).text(f.downvote);
                    },
                error:
                    function (error) {
                        console.log(error);
                    }
            })
        }
    </script>
@endpush
