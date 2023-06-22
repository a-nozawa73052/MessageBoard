<h1>ポジション登録画面</h1>
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
<form action="/position/confirm" method="POST">
<div>
    <p>新しいポジションの名前を入力してください</p>
    <input type="text" name="name">
</div>
<br>
<br>
<br>

<div>
    得意な選手を選択する
    <select name="players[]" multiple>
        @foreach ($all_players as $player)
        <option value="{{$player->id}}">
            {{$player->name}}
        </option>
        @endforeach
    </select>
</div>

<div>
<button class="btn btn-primary" type="submit" name="send">登録</button>
</div>
@csrf
</form>
