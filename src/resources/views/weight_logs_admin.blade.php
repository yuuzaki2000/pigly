@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/weight_logs_admin.css')}}">
<style>
        th {
            background-color:#fff;
            color:#000;
            padding: 15px 80px;
            border-bottom: 2px solid #000;
        }
        td {
            background-color:#fff;
            color:#000;
            padding:15px 80px;
        }
        .modal {
            position: fixed;
            top:0;
            left:0;
            visibility: hidden;
            width:100%;
            height: 100%;
            opacity:0;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
            background: rgba(0, 0, 0, 0.6);
        }

        .modal__inner {
            position: absolute;
            /* 以下の値を変更することでモーダルの画面の大きさが調整できる*/
            top:5%;
            left:30%;
            width: 40%;
            height: 90%;
            border: 1px solic #8B7969;
            background-color: #fff;
            box-shadow: 4px 4px 4px rgba(139,121,105,0.25);
            transform: : translate(-50%, -50%);
        }

        .modal__content {
            position: relative;
            padding: 64px 64px
        }

</style>
@section('content')
<div class="container">
    <div class="upper">
        <div class="upper-above"></div>
        <div class="upper-middle">
            <div class="goal-weight">
                <p>目標体重</p>
                <p>{{$target_weight}}kg</p>
            </div>
            <div class="diff">
                <p>目標まで</p>
                <p>- 1.5kg</p>
            </div>
            <div class="latest-weight">
                <p>最新体重</p>
                <p>{{$weight_log}}kg</p>
            </div>
        </div>
    <div class="upper-below"></div>
    </div>
    <div class="bottom">
        <div class="bottom-above">
            <form class="search-form" action="" method="post">
                <div class="search">
                    <input type="text" class="input-short">
                    <p>～</p>
                    <input type="text" class="input-short">
                    <div><button type="submit" class="search-btn">検索</button></div>
                </div>
                
            </form>
            <div><a href="#add" class="btn">データ追加</a></div>      
        </div>
        <table>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事摂取カロリー</th>
                <th>運動時間</th>
                <th></th>
            </tr>
            @foreach ($weight_logs as $weight_log)
            <tr>
                    <td>{{$weight_log->date}}</td>
                    <td>{{$weight_log->weight}}</td>
                    <td>{{$weight_log->calories}}</td>
                    <td>{{$weight_log->exercise_time}}</td>
                    <td>
                        <a href="/weight_logs/{{$weight_log->id}}">編集</a>
                    </td>
            </tr>
            <div class="modal" id="add">
                <div class="modal__inner">
                      <div class="modal__content">
                        <form action="/weight_logs/create" method="post">
                        @csrf
                        <div>
                            <input type="hidden" name="user_id" value="1">
                        </div>
                        <div>
                            <p>日付<span class="essential">必須</span></p>
                            <input type="text" name="date" class="input" value="" placeholder="">
                        </div>
                        <div>
                            <p>体重<span class="essential">必須</span></p>
                            <input type="text" name="weight" class="input" value="" placeholder="">
                        </div>
                        <div>
                            <p>消費カロリー<span class="essential">必須</span></p>
                            <input type="text" name="calories" class="input" value="" placeholder="">
                        </div>
                        <div>
                            <p>運動時間<span class="essential">必須</span></p>
                            <input type="text" name="exercise_time" class="input" value="" placeholder="">
                        </div>
                        <div>
                            <p>運動内容</p>
                            <textarea name="exercise_content" class="input" cols="30" rows="10"></textarea>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="back-btn">戻る</a>
                            <button type="submit" class="btn">登録</button>
                        </div>
                        </form>
                      </div>
                </div>
            </div>
            @endforeach
        </table>
        <div>
            {{$weight_logs->links('pagination::tailwind')}}
        </div>
    </div>
</div>
    
@endsection