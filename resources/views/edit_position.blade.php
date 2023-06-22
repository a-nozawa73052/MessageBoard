<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ポジション編集</title>
</head>
<body>
<h1>ポジション情報編集</h1>
<form action="" method="POST">

    <div>
        <label>
            ポジション名：
            <input type="text" name="name" value="{{ $position->name }}">
        </label>
    </div>

    <div>
        <label>
            <p>選手</p>
            @foreach ($all_players as $player)
            <input type="checkbox" name="positions[]" value="{{$player->id}}"
                @if( $position->players->contains('id',$player->id))
                {{-- この上のコードは$positionのplayersの配列のidに$playerのidがふくまれていればチェックする --}}
                    checked="checked"
                @endif
            >
                {{ $player->name }}<br>
            @endforeach
        </label>
    </div>


    <div>
        <input type="submit" name="submit" value="保存">
    </div>
    @csrf

</form>
<ul>
    <li><a href="/coach/add">コーチ登録画面へ</a></li>
    <li><a href="/coach">コーチ一覧画面へ</a></li>
    <li><a href="/team/add">チーム登録画面へ</a></li>
    <li><a href="/team">チーム一覧画面へ</a></li>
    <li><a href="/player/add">プレイヤー登録画面へ</a></li>
    <li><a href="/player">プレイヤー一覧画面へ</a></li>
    <li><a href="/position/add">ポジション登録画面へ</a></li>
    <li><a href="/position">ポジション一覧画面へ</a></li>
</ul>

</body>
</html>
