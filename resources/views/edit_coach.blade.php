<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>監督編集</title>
</head>
<body>
<h1>監督情報編集</h1>

<form action="" method="POST">

    <div>
        <label>
            監督名：
            <input type="text" name="name" value="{{ $coach->name }}">
        </label>
    </div>

    <div>
        チーム：
        @foreach ($all_teams as $team)
            <input type="radio" name="team_id" value="{{ $team->id }}">{{ $team->name }}
        @endforeach
    </div>

    <div>
        <input type="submit" name="submit" value="保存">
    </div>
    @csrf
</form>
</body>
</html>

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
