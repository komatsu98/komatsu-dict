@if($update->user == App\User::find(auth()->id()))
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="/user/updates/{{ $update->id }}/edit">
            <button type="button" class="btn btn-secondary rounded">Edit update</button>
        </a>
    </div>
@endif
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