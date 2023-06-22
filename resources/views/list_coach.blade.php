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

    監督名を入力
    <form action="/coach">
    <input type="text" name="search" value="{{$search}}">
    <input type="submit" value="検索">
    </form>

    <hr>

    <dl>
    @foreach ($all_coaches as $coach)
        <dt><b>監督名{{$coach->id}}：{{$coach->name}}</b></dt>
        <dd>
            担当チーム名：
                @if ($coach->team!=null)
                {{$coach->team->name}}
                @else
                担当チームなし
                @endif
        </dd>
        <br>
    @endforeach
    </dl>

</body>
</html>



