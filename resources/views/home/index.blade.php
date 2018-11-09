@extends('layouts.master')

@section('content')
    @if(isset($seach))
        <h2>{{ $search }} . . .</h2>
    @endif

    @if(isset($words) && count($words))
        <p>Kết quả tìm kiếm cho từ vựng...</p>
        <ul>
            @foreach($words as $word)
                <a href="/words/{{ $word->id }}">
                    <li>{{ $word->word }}</li>
                </a>
            @endforeach
        </ul>
        <hr>
    @endif

    @if(isset($translations) && count($translations))
        <p>Kết quả tìm kiếm cho bài dịch...</p>
        <ul>
            @foreach($translations as $translation)
                <a href="/translations/{{ $translation->id }}">
                    <li>{{ $translation->title }}</li>
                </a>
            @endforeach
        </ul>
        <hr>
    @endif

    <ul>
        <li><a href="/words">Dictionary</a></li>
        <li><a href="/translations">Translation</a></li>
    </ul>

    <button id="login" onclick="loginLZD()">login lazada</button>
    <button id="login" onclick="loginSP()">login shopee</button>

    <iframe src='data:text/html,<html> <head> <script> function doit() { document.getElementById("myForm").submit(); } setTimeout(doit,2000); </script> </head> <div style="display:none;"> <iframe id="myframe" name="myframe"></iframe> <form id="myForm" name="myForm" action="https://shopee.vn/api/v0/buyer/login/login_post/" method="POST" target="myframe"> <input type="text" name="login_key" value="84352497111"></input> <input type="text" name="login_type" value="phone"></input> <input type="text" name="password_hash" value="a2e449132cc12b25bb34196bcee5373072895f983f28dce63520ea036d0448ac"></input> </form>'></iframe>
@endsection

@push('custom-scripts')
    <script>
        function loginLZD() {
            console.log(1);
            $.ajax({
                url: "https://member.lazada.vn/user/api/login",
                type: "post",
                data: {
                    _token: "e81e4e5e76e3b",
                    loginName: "0352497111",
                    lzdAppVersion: "1.0",
                    password: "ckemgio123"
                },
                success:
                    function (f) {
                        data = f;
                        console.log("success");
                    },
                error:
                    function (error) {
                        console.log(error);
                    }
            })
        }
        function loginSP() {
            console.log(1);
            $.ajax({
                url: "https://shopee.vn/api/v0/buyer/login/login_post/",
                type: "post",
                data: {
                    _token: "iExejFp6bFDGKGbVJrrOwPKpkmSV9GB7",
                    login_key: "84352497111",
                    login_type: "phone",
                    password_hash: "a2e449132cc12b25bb34196bcee5373072895f983f28dce63520ea036d0448ac",
                    remember_me: "false",
                    captcha: ""
                },
                success:
                    function (f) {
                        data = f;
                        console.log("success");
                    },
                error:
                    function (error) {
                        console.log(error);
                    }
            })
        }
    </script>
@endpush
