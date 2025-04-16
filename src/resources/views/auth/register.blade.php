@extends('layouts.register')

@section('css')
<link rel="stylesheet" href="{{asset('css/users_register.css')}}">

@section('content')
<div class="container">
        <h1 class="header">PiGLy</h1>
        <div class="inner">
            <div><p class="newer">新規会員登録</p></div>
            <div><p class="step1">STEP1 アカウント情報の登録</p></div>
            <form action="/register" method="post">
            @csrf
                <div>
                    <p>お名前</p>
                    <input type="text" name="name" value="{{old('name')}}">
                </div>
                @error('name')
                        <div>
                            <p class="error-message">{{$errors->first('name')}}</p>
                        </div>                       
                @enderror
                <div>
                    <p>メールアドレス</p>
                    <input type="email" name="email" value="{{old('email')}}">
                </div>
                @error('email')
                        <div>
                            <p class="error-message">{{$errors->first('email')}}</p>
                        </div>                       
                @enderror
                <div>
                    <p>パスワード</p>
                    <input type="password" name="password">
                </div>
                @error('password')
                        <div>
                            <p class="error-message">{{$errors->first('password')}}</p>
                        </div>                       
                @enderror
                <button class="btn" type="submit">次に進む</button>
                <a href="/register/step2">STEP2へ</a>
            </form>
        </div>
    </div>
@endsection