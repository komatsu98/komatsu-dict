@php

use App\Word;
use Illuminate\Support\Facades\DB;

$db_driver = DB::connection()->getPDO()->getAttribute(constant("PDO::ATTR_DRIVER_NAME"));
switch ($db_driver) {
    case 'mysql':
        $archives = Word::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();
        break;
    case 'pgsql':
        //
        $archives = Word::selectRaw('extract(year FROM created_at) as year, extract(month FROM created_at) as month')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at)')
            ->get()
            ->toArray();
        break;
    default:
        throw new Exception('Driver not supported.');
        break;
}
@endphp


<div class="p-3 mb-3 bg-light rounded">
    <h4 class="font-italic">Todos</h4>

    <ul>
        <li>
            <b>Up bài dịch</b>
            <ul>
                <li>Hỗ trợ convert markdown -> html</li>
                <li>Chia các đoạn markdown ra, chèn vào (mờ đi) tương ứng trên các textarea để dịch</li>
            </ul>
        </li>
        <li>
            <b style="text-decoration: line-through">Search</b>
        </li>
        <li>
            <b>Pagination</b>
        </li>
        <li>
            <b>Real time Vote</b>
            <ul>
                <li>socket?</li>
            </ul>
        </li>
    </ul>

</div>

<div class="p-3">
    <h4 class="font-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        @if(isset ($archives))
            @foreach($archives as $stats)
                <li>
                    <a href="/words?month={{ $stats['month'] }}&year={{ $stats['year'] }}">
                        {{ $stats['month'] . ' ' . $stats['year']}}
                    </a>
                </li>
            @endforeach
        @endif
    </ol>
</div>

<div class="p-3">
    <h4 class="font-italic">Tag</h4>
    <ol class="list-unstyled">
        @if(\App\Tag::all())
            @foreach(\App\Tag::all() as $tag)
                <li><a href="/words?tag={{ $tag->id }}">{{ $tag->name }}</a></li>
            @endforeach
        @endif
    </ol>
</div>