<div class="float-right">
    @if(auth()->id() == 1 && (request()->route()->getName() == 'admin_word_detail' || request()->route()->getName() == 'admin_user_detail'))
        @if($update->rate()['uprate'])
            <button class="star" id="upvote_{{$update->id}}"
                    onclick="upvote({{$update->id}})">
                <i class="fas fa-star star-up"></i>
            </button>
            <button class="star opacity-p2" id="downvote_{{$update->id}}"
                    onclick="downvote({{$update->id}})"><i class="fas fa-star star-down"></i>
            </button>

        @elseif(!$update->rate()['downrate'])
            <button class="star opacity-p2" id="upvote_{{$update->id}}"
                    onclick="upvote({{$update->id}})">
                <i class="fas fa-star star-up"></i>
            </button>
            <button class="star opacity-p2" id="downvote_{{$update->id}}"
                    onclick="downvote({{$update->id}})"><i class="fas fa-star star-down"></i>
            </button>
        @else
            <button class="star opacity-p2" id="upvote_{{$update->id}}"
                    onclick="upvote({{$update->id}})">
                <i class="fas fa-star star-up"></i>
            </button>
            <button class="star " id="downvote_{{$update->id}}"
                    onclick="downvote({{$update->id}})"><i class="fas fa-star star-down"></i>
            </button>
        @endif
    @else
        <button class="btn star">
            @if($update->rate()['uprate'])
                <i class="fas fa-star star-up"></i>
            @elseif(!$update->rate()['downrate'])
                <i class="far fa-star"></i>
            @else
                <i class="fas fa-star star-down"></i>
            @endif
        </button>

        <button class="btn btn-success" id="upvote_{{$update->id}}"
                onclick="upvote({{$update->id}})">{{ $update->countVotes()['upvote'] }}</button>
        <button class="btn btn-danger" id="downvote_{{$update->id}}"
                onclick="downvote({{$update->id}})">{{ $update->countVotes()['downvote'] }}</button>
    @endif
</div>


<p class="">Theo <b style="color:green">{{ $update->field }}: </b></p>
<hr style="width:80%; margin-left: 0">

<p>
    <span class="font-weight-bold">Giải thích tiếng Anh: </span>
    <span>{{ $update->en_meaning }}</span>
</p>
<p>
    <span class="font-weight-bold mt-2">Nghĩa tiếng Việt</span>
    <span>{{ $update->vi_meaning }}</span>
</p>

@if($update->example)
    <p>
        <span class="font-weight-bold">Ví dụ: </span>
        <span>{{ $update->example }}</span>
    </p>
    <p>
        <span class="font-weight-bold">Dịch: </span>
        <span>{{ $update->example_meaning }}</span>
    </p>
@endif
@if($update->note)
    <p>
        <b>Ghi chú:</b>
        <i>
            {{ $update->note }}
        </i>
    </p>
@endif



<div class="btn-group d-flex justify-content-end" style="width:100%; margin-top: -1rem" role="group" aria-label="Basic example">
    <div class="blog-post-meta mb-auto mt-auto mr-2" style="font-size: 0.9rem">
        by <b>{{ $update->user->name}}</b> on
        {{ $update->updated_at->diffForHumans() }}
    </div>
    @if($update->user == App\User::find(auth()->id()))
        <a href="/user/updates/{{ $update->id }}/edit" class="mr-0">
            <button type="button" class="btn btn-secondary star origin-color"><i class="far fa-edit"></i></button>
        </a>
        <form method="POST" action="/user/updates/{{ $update->id }}">

            @csrf
            {{ method_field('DELETE') }}

            <a href="/user/updates/{{ $update->id }}">
                <button type="submit" class="btn btn-danger star origin-color"><i class="far fa-trash-alt"></i></button>
            </a>
        </form>

    @endif
    {{--<a href="/user/word/updates">--}}
    {{--<button type="button" class="btn btn-secondary rounded">Edit update</button>--}}
    {{--</a>--}}

</div>