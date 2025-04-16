@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<style>
        th {
            background-color: aqua;
            color:white;
            padding: 15px 40px;
        }
        td {
            background-color: yellow;
            color:black;
            padding:15px 40px;
        }
</style>
@section('content')
<div class="container">
    <div class="upper">
        <div class="upper-above"></div>
        <div class="upper-middle">
            <div class="goal-weight">
                <p>目標体重</p>
                <p>45.0kg</p>
            </div>
            <div class="diff">
                <p>目標まで</p>
                <p>- 1.5kg</p>
            </div>
            <div class="latest-weight">
                <p>最新体重</p>
                <p>46.5kg</p>
            </div>
        </div>
    <div class="upper-below"></div>
    </div>
    <div class="bottom">
        <div class="bottom-above">
            <form class="search-form" action="" method="post">
                <input type="text">
                ～
                <input type="text">
                <button type="submit">検索</button>
            </form>
            <button class="btn">データ追加</button>        
        </div>
        <table>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事摂取カロリー</th>
                <th>運動時間</th>
            </tr>
            @foreach ($weight_logs as $weight_log)
                <tr>
                    <td>{{$weight_log->date}}</td>
                    <td>{{$weight_log->weight}}</td>
                    <td>{{$weight_log->calories}}</td>
                    <td>{{$weight_log->exercise_time}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
    
@endsection