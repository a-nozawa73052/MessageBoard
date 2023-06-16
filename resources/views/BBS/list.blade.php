<h1>伝言板の一覧</h1>

@if ($contacts->count() > 0)

{{-- 検索 --}}
伝言の宛先［メールアドレス］で検索をかけることができます。
{{-- IDで検索をかけることができます。 --}}
<br>
<form action="/MessageBoard/index" method="get">
    <input type="text" name="search" value="{{$search}}">
    <input type="submit" value="検索">
</form>

{{-- 一覧の表示 --}}
    <table border="1">
        <tr>
            <th></th>
            <th>ID</th>
            <th>名前</th>
            <th>あなたの連絡先［メールアドレス］</th>
            <th>伝言の宛先［メールアドレス］</th>
            <th>要件・詳細</th>
            <th>送信日時</th>
            <th>確認状況</th>
            <th>編集</th>
            <th>削除</th>

        </tr>
        {{-- @foreach ディレクティブで、1件ずつ処理 --}}
        @foreach ($contacts as $contact)
            <tr>
                <td>
                    @empty($contact->status)
                    <form action="/MessageBoard/status/{{$contact->id}}" method="post">
                        <div><button  name="status_com" type="submit">
                            確認済みにする</button>
                        </div>
                        @csrf
                    </form>
                    @else
                    <form action="/MessageBoard/status/{{$contact->id}}"  method="post">
                        <div><button name="status_incom" type="submit">
                            未確認に戻す</button>
                        </div>
                        @csrf
                    </form>
                    @endempty
                </td>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->mail }}</td>
                <td>{{ $contact->destination}}</td>
                <td>{{ $contact->message}}</td>
                <td>{{ $contact->created_at }}</td>
                <td>{{ $contact->status }}</td>
                <td>
                    <a href="/MessageBoard/edit/{{$contact->id}}">編集</a>
                </td>
                <td>
                    <form action="/MessageBoard/delete/{{$contact->id}}" name="delete" method="post">
                        <div><button type="submit">削除</button></div>
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>お問い合わせがありません</p>
@endif
