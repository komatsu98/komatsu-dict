<div class="btn-group d-flex justify-content-start" role="group" aria-label="Basic example">
    @if($update->user == App\User::find(auth()->id()))
        <a href="/user/updates/{{ $update->id }}/edit" class="mr-2">
            <button type="button" class="btn btn-secondary rounded">Edit update</button>
        </a>
        <form method="POST" action="/user/updates/{{ $update->id }}">

            @csrf
            {{ method_field('DELETE') }}

            <a href="/user/updates/{{ $update->id }}">
                <button type="submit" class="btn btn-danger rounded">Delete update</button>
            </a>
        </form>

    @endif
    {{--<a href="/user/word/updates">--}}
    {{--<button type="button" class="btn btn-secondary rounded">Edit update</button>--}}
    {{--</a>--}}

</div>

<div class="float-right">
    <button class="btn btn-success" id="upvote_{{$update->id}}"
            onclick="upvote({{$update->id}})">{{ $update->countVotes()['upvote'] }}</button>
    <button class="btn btn-danger" id="downvote_{{$update->id}}"
            onclick="downvote({{$update->id}})">{{ $update->countVotes()['downvote'] }}</button>
</div>
<p class="blog-post-meta">
    by <b>{{ $update->user->name}}</b> on
    {{ $update->updated_at->diffForHumans() }}
</p>
@if($update['field'])
    Theo <b>{{ $update->field }}: </b>
@endif
<span>{{ $update->meaning }}</span>

@if($update->example)
    <p>Ví dụ: {{ $update->example }}</p>
    <p>Dịch: <i>{{ $update->example_meaning }}</i></p>
@endif
@if($update->note)
    <p>
        <b>Ghi chú:</b>
        <i>
            {{ $update->note }}
        </i>
    </p>

@endif