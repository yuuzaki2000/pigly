<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css"/>
    <link rel="stylesheet" href="{{asset('css/app_common.css')}}">
    @yield('css')
</head>
<body>
    <header class="app-header">
        <h1>PiGly</h1>
        <div class="btn-group">
            <a href="/weight_logs/goal_setting" class="setting-btn">目標体重設定</a>
            <form action="/logout" method="post">
            @csrf
                <button type="submit" class="setting-btn logout-btn">ログアウト</button>
            </form>
        </div>
    </header>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>