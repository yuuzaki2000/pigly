@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/weight_target_update')}}">

@section('content')
<div class="container">
    <div class="inner">
      <form action="/weight_logs/goal_setting" method="post">
      @csrf
          <h2>目標体重設定</h2>
          <input type="hidden" name="id" value="{{$weight_target['id']}}">
          <input type="hidden" name="user_id" value={{$user_id}}>
          <input type="text" name="target_weight" value="{{$weight_target['target_weight']}}">kg
          @error('target_weight')
          <div><p class="error-message">{{$errors->first('target_weight')}}</p></div>
          @enderror
          <div class="btn-group">
            <a href="/weight_logs" class="btn">戻る</a>
            <button type="submit" class="btn">更新</button>
          </div>
      </form>
    </div>
</div>
    
@endsection