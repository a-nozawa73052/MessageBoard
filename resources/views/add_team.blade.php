<h1>チーム登録画面</h1>
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
<form action="/team/confirm" method="POST">
<div>
    <b><p>新しいチームの名前を入力してください</p></b>
    <input type="text" name="name">
</div>
<br>
<div>
    <b>新しいチームを担当する監督は誰ですか</b><br>
    {{-- 監督データをラジオボタンで表示し、選択できるようにする --}}
    @foreach ($all_coaches as $coach)
        <input type="radio" name="coach_id" value="{{ $coach->id }}">{{ $coach->name }}<br>
    @endforeach
    <input type="radio" name="coach_id" value="null">監督を設定しない<br>
</div>

<div>
<button class="btn btn-primary" type="submit" name="send">登録</button>
</div>
@csrf
</form>
