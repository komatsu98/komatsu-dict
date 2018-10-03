<div>
    @php
        $updates = $word->updates()->where([['field', $update->field], ['id', '!=', $update->id]])->get();
    @endphp
    @if(count($updates))
        <button id="showData{{ $update->id }}" class="btn btn-primary"
                type="button" data-toggle="collapse" data-target="#data{{ $update->id }}" aria-expanded="false"
                aria-controls="data{{ $update->id }}">

            Show/Hide updates in this field...
        </button>

        <div class="collapse ml-4 mt-2 pl-2 border-left" id="data{{ $update->id }}">
            @foreach($updates as $update)
                <hr>
                @include('update.show')
            @endforeach
        </div>
    @endif
</div>