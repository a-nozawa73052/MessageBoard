<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>伝言の内容確認</title>
</head>
<body>
    {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}

    <h1>伝言の内容確認</h1>
    <ul>
    <li>お名前：<p>{{$request->name}}</p></li>
    <li>連絡先：<p>{{$request->mail}}</p></li>
    <li>伝言の宛先：<p>{{$request->destination}}</p></li>
    <li>要件・詳細：<p>{{$request->message}}</p></li>
    </ul>
    <form action="" method="post">
        <input type="hidden" name="name" value="{{$request->name}}">
        <input type="hidden" name="mail" value="{{$request->mail}}">
        <input type="hidden" name="destination" value="{{$request->destination}}">
        <input type="hidden" name="message" value="{{$request->message}}">
    <div>
        <button type="submit" name="back" class="btn btn-primary">
        <i class="fa-solid fa-caret-left"></i>
        戻る
        </button>

        <button type="submit" name="send" class="btn btn-primary">
        送信<i class="fa-solid fa-caret-right"></i>
        </button>
    </div>
    @csrf
</form>
</body>
</html>
