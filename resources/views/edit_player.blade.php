<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選手編集</title>
</head>
<body>
<h1>選手情報編集</h1>

<form action="" method="POST">

    <div>
        <label>
            選手名
            <input type="text" name="name" value="{{ $player->name }}">
        </label>
    </div>

    <div>
        所属チーム
        @foreach ($all_teams as $team)
            <input type="radio" name="team_id" value="{{ $team->id }}"

                @if( $player->team != null && $team->id == $player->team->id)
                    checked="checked"
                @endif
            >
                {{ $team->name }}
        @endforeach
    </div>

    <div>
        得意ポジション
        <select name="positions[]" multiple>
            @foreach ($all_positions as $position)
            <option value="{{$position->id}}"
                @if ($player->positions!=null && $player->positions->contains('id', $position->id))
                    selected="selected"
                @endif
                >
                {{$position->name}}
            </option>
            @endforeach
        </select>
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
