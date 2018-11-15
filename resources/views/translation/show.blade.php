@extends('layouts.master')

@section('content')
    <div id="raw_html" class="mt-4">
        {{ $body_html }}
    </div>
    <div>
        <em>{{ $translation->created_at->diffForHumans() }}</em>
    </div>
    <div>
        Người dịch: {{ $translation->user->name }}
    </div>
@endsection

@push('custom-scripts')
    <script>
        var markup = $('#raw_html').text();
        $('#raw_html').html(markup);
    </script>
@endpush