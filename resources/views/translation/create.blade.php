@extends('layouts.master')

@section('content')

    <h1>Thêm bài dịch</h1>
    <hr>
    <form method="POST" action="/user/translations">

        @csrf

        <div class="form-group ">
            <div>
                <label for="source_title">Tiêu đề gốc</label>
                <input type="text" class="form-control" name="source_title" required>
            </div>
            <div>
                <label for="link">Link bài gốc</label>
                <input type="text" class="form-control" name="link" required>
            </div>
            <div>
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" placeholder="something-like-this" required>
            </div>
            <div>
                <label for="source_body">Markdown bài gốc</label>
                <textarea type="text" class="form-control" name="source_body" placeholder=""></textarea>
            </div>
            <br>
            <hr>
            <br>
            <div>
                <label for="trans_title">Tiêu đề bài dịch</label>
                <input type="text" class="form-control" name="trans_title" required>
            </div>
            <div>
                <label for="trans_body">Markdown</label>
                <textarea type="text" class="form-control" name="trans_body" placeholder=""></textarea>
            </div>
        </div>

        <br>

        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" class="form-control" name="tags" placeholder="Cách nhau bởi dấu ','">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        @include('layouts.errors')

    </form>

@endsection
