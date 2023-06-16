<h1>BBS</h1>
<p>ようこそここは伝言板です。以下にご入力ください。</p>

{{-- ここはエラーの --}}
@foreach ($errors->all() as $error)
<li>
<span class="error">{{$error}}</span>
</li>
@endforeach

{{-- ここからフォーム --}}


<form action="/MessageBoard/confirm" method="post">
    <div>
        <label for="name">名前
            <input type="text" id="name" name="name" value="{{old('name')}}">
        </label>

    @if ($errors->has('name'))
    <span class="error">{{$errors->first('name')}}</span>
    @endif
<br>
        <label for="mail">あなたの連絡先［メールアドレス］
            <input type="email" name="mail" id="mail" value="{{old('mail')}}">
        </label>

    @if ($errors->has('mail'))
        <span class="error">{{$errors->first('mail')}}</span>
    @endif

<br>
        <label for="destination">伝言の宛先［メールアドレス］
            <input type="email" name="destination" id="destination" value="{{old('destination')}}">
        </label>

    @if ($errors->has('destination'))
        <span class="error">{{$errors->first('destination')}}</span>
    @endif

<br>
        <label for="message">要件・詳細
            <textarea name="message" id="message" cols="30" rows="10" >{{ old('message') }}</textarea>
        </label>

    @if ($errors->has('message'))
        <span class="error">{{$errors->first('message')}}</span>
    @endif

<br>
        <input type="submit" value="送信" >



    @csrf
</form>
