@extends('layouts.register')

@section('css')
<link rel="stylesheet" href="{{asset('css/weight_target_register.css')}}">

@section('content')
<div class="container">
        <h1 class="header">PiGLy</h1>
        <div class="inner">
            <div><p class="newer">新規会員登録</p></div>
            <div><p class="step2">STEP2 体重データの入力</p></div>
            <form action="/weight_logs" method="post">
            @csrf
                <div>
                    <p>user_id</p>
                    <input type="text" name="user_id" value="{{$user_id}}">
                </div>
                <div>
                    <p>現在時刻</p>
                    <input type="text" name="date" value="{{$date}}">
                </div>
                <div>
                    <p>現在の体重</p>
                    <div class=" weight">
                        <input type="text" class="input" name="weight" value="" placeholder="現在の体重を入力">
                        <p>kg</p>
                    </div>
                    @error('weight')
                        <div><p>{{$errors->first('weight')}}</p></div>
                    @enderror
                </div>
                <div>
                    <p>目標の体重</p>
                    <div class=" weight">
                        <input type="text" class="input" name="target_weight" value="" placeholder="目標の体重を入力">
                        <p>kg</p>
                    </div>
                    @error('target_weight')
                        <div><p>{{$errors->first('target_weight')}}</p></div>
                    @enderror
                </div>
                <button class="btn" type="submit">アカウント作成</button>
            </form>
        </div>
    </div>
@endsection