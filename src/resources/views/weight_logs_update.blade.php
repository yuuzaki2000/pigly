@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/weight_logs_update')}}">
<style>
    .essential {
        background-color: red;
        font-size: 12px;
        color: #fff;
        border-radius: 5px;
    }
</style>

@section('content')
<div class="container">
  <form class= "form" action="/weight_logs/{{$weight_log->id}}/update" method="post">
  @csrf
  <div class="inner">
    <div>
        <p>id</p>
        <input type="text" name="id" value="{{$weight_log['id']}}">
    </div>
    <div>
        <p>user_id</p>
        <input type="text" name="user_id" value="{{$weight_log['user_id']}}">
    </div>
    <div>
        <p>日付<span class="essential">必須</span></p>
        <input type="date" name="date" class="input" value="{{$weight_log['date']}}" placeholder="">
    </div>
    @error('date')
        <div><p class="error-message">{{$errors->first('date')}}</p></div>
    @enderror
    <div>
        <p>体重<span class="essential">必須</span></p>
        <input type="text" name="weight" class="input" value="{{$weight_log['weight']}}" placeholder="">
    </div>
    @error('weight')
        <div><p class="error-message">{{$errors->first('weight')}}</p></div>
    @enderror
    <div>
        <p>消費カロリー<span class="essential">必須</span></p>
        <input type="text" name="calories" class="input" value="{{$weight_log['calories']}}" placeholder="">
    </div>
    @error('calories')
        <div><p class="error-message">{{$errors->first('calories')}}</p></div>
    @enderror
    <div>
        <p>運動時間<span class="essential">必須</span></p>
        <input type="text" name="exercise_time" class="input" value="{{$weight_log['exercise_time']}}" placeholder="">
    </div>
    @error('exercise_time')
        <div><p class="error-message">{{$errors->first('exercise_time')}}</p></div>
    @enderror
    <div>
        <p>運動内容</p>
        <textarea name="exercise_content" class="input" value="{{$weight_log['exercise_content']}}" cols="60" rows="3"></textarea>
    </div>
    @error('exercise_content')
        <div><p class="error-message">{{$errors->first('exercise_content')}}</p></div>
    @enderror
    <div class="btn-group">
        <a href="#" class="btn">戻る</a>
        <button type="submit" class="btn">更新</button>
    </div>
  </div>
  </form>
  <form action="/weight_logs/{{$weight_log->id}}/delete" method="post">
  @csrf
            <input type="hidden" name="id" value="{{$weight_log->id}}">
            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>　</button>
  </form>
</div>
@endsection