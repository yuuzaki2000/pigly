@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/weight_logs_update')}}">

@section('content')
<form action="" method="post">
@csrf
    <div>
        <p>日付<span class="essential">必須</span></p>
        <input type="text" name="date" class="input" value="{{$weight_log->date}}" placeholder="">
    </div>
    <div>
        <p>体重<span class="essential">必須</span></p>
        <input type="text" name="weight" class="input" value="{{$weight_log->weight}}" placeholder="">
    </div>
    <div>
        <p>消費カロリー<span class="essential">必須</span></p>
        <input type="text" name="calories" class="input" value="{{$weight_log->calories}}" placeholder="">
    </div>
    <div>
        <p>運動時間<span class="essential">必須</span></p>
        <input type="text" name="exercise_time" class="input" value="{{$weight_log->exercise_time}}" placeholder="">
    </div>
    <div>
        <p>運動内容</p>
        <textarea name="exercise_content" class="input" value="{{$weight_log->exercise_content}}" cols="30" rows="10"></textarea>
    </div>
    <div class="btn-group">
        <a href="#" class="back-btn">戻る</a>
        <button type="submit" class="btn">登録</button>
    </div>

</form>    
@endsection