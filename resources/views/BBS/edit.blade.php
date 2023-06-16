{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

<h1>伝言板の編集</h1>

<form action="/MessageBoard/edit/{{$contact->id}}" method="POST">
    <div>
        <label for="name">名前
            <input type="text" id="name" name="name" value="{{old('name', $contact->name)}}">
        </label>

    @if ($errors->has('name'))
    <span class="error">{{$errors->first('name')}}</span>
    @endif
<br>
        <label for="mail">あなたの連絡先［メールアドレス］
            <input type="email" name="mail" id="mail" value="{{old('mail', $contact->mail)}}">
        </label>

    @if ($errors->has('mail'))
        <span class="error">{{$errors->first('mail')}}</span>
    @endif

<br>
        <label for="destination">伝言の宛先［メールアドレス］
            <input type="email" name="destination" id="destination" value="{{old('destination', $contact->destination)}}">
        </label>

    @if ($errors->has('destination'))
        <span class="error">{{$errors->first('destination')}}</span>
    @endif

<br>
        <label for="message">要件・詳細
            <textarea name="message" id="message" cols="30" rows="10" >{{ old('message', $contact->message) }}</textarea>
        </label>

    @if ($errors->has('message'))
        <span class="error">{{$errors->first('message')}}</span>
    @endif
    </div>


    <div>
        <input type="submit" value="送信">
    </div>
    @csrf
</form>
