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
                <p>{{$target_weight->target_weight}}kg</p>
            </div>
            <div class="diff">
                <p>目標まで</p>
                <p>{{($target_weight->target_weight) - ($weight_log->weight)}}kg</p>
            </div>
            <div class="latest-weight">
                <p>最新体重</p>
                <p>{{$weight_log->weight}}kg</p>
            </div>
        </div>
    <div class="upper-below"></div>
    </div>
    <div class="bottom">
        <div class="bottom-above">
            <form class="search-form" action="/" method="post">
                @csrf
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
                        <a href="/weight_logs/{{$weight_log->id}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>　</a>
                    </td>
            </tr>
            <div class="modal" id="add">
                <div class="modal__inner">
                      <div class="modal__content">
                        <form action="/weight_logs/{{$weight_log->id}}/create" method="post">
                        @csrf
                            <div>
                                <h2>Weight Logを追加</h2>
                            </div>
                            <div>
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                            </div>
                            <div>
                                <p>日付<span class="essential">必須</span></p>
                                <input type="date" name="date" class="input" value="" placeholder="">
                            </div>
                            @error('date')
                                <div><p class="error-message">{{$errors->first('date')}}</p></div>
                            @enderror
                            <div>
                                <p>体重<span class="essential">必須</span></p>
                                <input type="text" name="weight" class="input" value="" placeholder="">
                            </div>
                            @error('weight')
                                <div><p class="error-message">{{$errors->first('weight')}}</p></div>
                            @enderror
                            <div>
                                <p>消費カロリー<span class="essential">必須</span></p>
                                <input type="text" name="calories" class="input" value="" placeholder="">
                            </div>
                            @error('calories')
                                <div><p class="error-message">{{$errors->first('calories')}}</p></div>
                            @enderror
                            <div>
                                <p>運動時間<span class="essential">必須</span></p>
                                <input type="text" name="exercise_time" class="input" value="" placeholder="">
                            </div>
                            @error('exercise_time')
                                <div><p class="error-message">{{$errors->first('exercise_time')}}</p></div>
                            @enderror
                            <div>
                                <p>運動内容</p>
                                <textarea name="exercise_content" class="input" cols="60" rows="5" placeholder="運動内容を追加"></textarea>
                            </div>
                            @error('exercise_content')
                                <div><p class="error-message">{{$errors->first('exercise_content')}}</p></div>
                            @enderror
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