<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightRequest;
use App\Http\Requests\WeightTargetRequest;


class WeightTargetController extends Controller
{
    //
    public function index(){
        $user_id = Auth::id();
        $date = now()->format('Y/m/d');
        return view("weight_target_register", compact('user_id', 'date'));
    }

    public function store(WeightRequest $request){
        $form = $request->all();
        WeightTarget::create($form);
        return redirect('/weight_logs');
    }

    public function edit(){
        $user_id = Auth::id();
        $weight_target = WeightTarget::where('user_id', $user_id)->first();
        return view('weight_target_update', compact('weight_target', 'user_id'));
    }

    public function update(Request $request){
        $form = $request->all();
        unset($form['_token']);
        WeightTarget::find($request->id)->update($form);
        return redirect('/weight_logs');
    }
}
