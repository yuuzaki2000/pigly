<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Http\Requests\WeightRequest;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    //
    public function index(){
        $weight_logs = WeightLog::paginate(8);
        $weight_log = WeightLog::orderBy('created_at', 'desc')->orderBy('id', 'desc')->first();
        $target_weight = WeightTarget::where('user_id', 1)->first();
        return view('weight_logs_admin', compact('weight_logs', 'weight_log', 'target_weight'));
    }

    public function store(WeightRequest $request){
        $form = $request->all();
        WeightLog::create($form);
        return redirect('/weight_logs');
    }

    public function bind(WeightLog $weightLogId){
        $data = [
            'weight_log' => $weightLogId,
        ];
        return view('weight_logs_update', $data);
    }


}
