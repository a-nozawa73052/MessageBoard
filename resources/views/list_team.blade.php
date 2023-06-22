<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>一覧画面</title>
</head>
<body>
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

    チーム名を入力してね
    <form action="/team">
    <input type="text" name="search" value="{{$search}}">
    <input type="submit" value="検索">
    </form>

    <hr>
    @foreach ($all_teams as $team)
        <h2>チーム名： {{$team->name}} 監督：
            @if ($team->coach_id!=null)
            {{$team->coach->name}}
            @else
            監督の設定無し
            @endif
        </h2>

        <p>所属プレイヤー</p>
        <ul>
            @foreach ($team->players as $player)
                <li>{{$player->name}}</li>
            @endforeach
        </ul>
    @endforeach


</body>
</html>


