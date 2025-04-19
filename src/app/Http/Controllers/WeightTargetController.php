<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightRequest;

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
}
