<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>一覧画面</title>
</head>
<body>
    <h2>{{Auth::user()->name}}さんこんにちわ！</h2>
    <form action="{{route('dashboard')}}" method="get">
    <button type="submit">ダッシュボード</button>
    @csrf
    </form>
    <form action="{{route('logout')}}" method="post">
    <button type="submit">ログアウト</button>
    @csrf
    </form>

    <header>
    <a href="/coach/add"><button type="button">コーチ登録</button></a>
    <a href="/coach"><button type="button">コーチ一覧</button></a>
    <a href="/team/add"><button type="button">チーム登録</button></a>
    <a href="/team"><button type="button">チーム一覧</button></a>
    <a href="/player/add"><button type="button">プレイヤー登録</button></a>
    <a href="/player"><button type="button">プレイヤー一覧</button></a>
    <a href="/position/add"><button type="button">ポジション登録</button></a>
    <a href="/position"><button type="button">ポジション一覧</button></a>
    <hr>
    </header>
    ポジション名を入力してね
    <form action="/position">
    <input type="text" name="search" value="{{$search}}">
    <input type="submit" value="検索">
    </form>

    <hr>

    @foreach ($all_positions as $position)
        <p>ポジション{{$position->id}} : {{$position->name}}</p>
    @endforeach

</body>
</html>



