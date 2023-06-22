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
    プレイヤー名を入力してね
    <form action="/player">
    <input type="text" name="search" value="{{$search}}">
    <input type="submit" value="検索">
    </form>

    <hr>
        @foreach ($all_players as $player)
        <b><dl>プレイヤー名{{$player->id}}： {{$player->name}} </dl></b>
        <dt>所属チーム: {{$player->team->name}}</dt>
        <dt><p>得意ポジション</p></dt>
        <dl>
            <ul>
            @foreach ($player->positions as $position)
            <li>{{$position->name}}</li>
            @endforeach
            </ul>
        </dl>
        @endforeach


</body>
</html>



