<h1>コーチ登録画面</h1>
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
<form action="/coach/confirm" method="POST">
<div>
    <p>新しいコーチの名前を入力してください</p>
    <input type="text" name="name">
</div>


{{-- <div>
    チーム：
    @foreach ($all_teams as $team)
        <input type="radio" name="team_id" value="{{ $team->id }}">{{ $team->name }}
    @endforeach
</div> --}}

<div>
<button class="btn btn-primary" type="submit" name="send">登録</button>
</div>
@csrf
</form>
