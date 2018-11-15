<div>
    @php
        $updates = $word->updates()->where([['field', $update->field], ['id', '!=', $update->id]])->get();
    @endphp
    @if(count($updates))
        <button id="showData{{ $update->id }}" class="btn btn-primary mt-2 mb-3"
                type="button" data-toggle="collapse" data-target="#data{{ $update->id }}" aria-expanded="false"
                aria-controls="data{{ $update->id }}">

            Show/Hide translations in this field...
        </button>

        <div class="collapse " id="data{{ $update->id }}">

            <ol>
                @foreach($updates as $update)

                <li>
                    @include('update.show')
                </li>
                @endforeach
            </ol>
        </div>
    @endif
</div>