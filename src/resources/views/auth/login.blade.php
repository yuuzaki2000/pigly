@extends('layouts.register')

@section('css')
<link rel="stylesheet" href="{{asset('css/users_login.css')}}">

@section('content')
<div class="container">
        <h1 class="header">PiGLy</h1>
        <div class="inner">
            <div><p class="login">ログイン</p></div>
            <form action="/login" method="post">
            @csrf
                <div>
                    <p>メールアドレス</p>
                    <input type="email" name="email" value="{{old('email')}}" placeholder="メールアドレスを入力">
                </div>
                @error('email')
                        <div>
                            <p class="error-message">{{$errors->first('email')}}</p>
                        </div>                       
                @enderror
                <div>
                    <p>パスワード</p>
                    <input type="password" name="password" placeholder="パスワードを入力">
                </div>
                @error('password')
                        <div>
                            <p class="error-message">{{$errors->first('password')}}</p>
                        </div>                       
                @enderror
                <button class="btn" type="submit">ログイン</button>
                <a href="/register/step1">アカウント作成はこちら</a>
            </form>
        </div>
    </div>
@endsection