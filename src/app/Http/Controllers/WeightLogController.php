<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;
use App\Http\Requests\WeightRequest;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WeightLogRequest;


class WeightLogController extends Controller
{
    //
    public function index(){
        $weight_logs = WeightLog::paginate(8);
        $user_id = Auth::id();
        $weight_log = WeightLog::orderBy('created_at', 'desc')->orderBy('id', 'desc')->first();
        $target_weight = WeightTarget::where('user_id', $user_id)->first();
        return view('weight_logs_admin', compact('weight_logs', 'weight_log', 'target_weight','user_id'));
    }

    public function store(WeightRequest $request){
        $form = $request->all();
        WeightLog::create($form);
        return redirect('/weight_logs');
    }

    public function detail(WeightLog $weightLogId){
        $data = [
            'weight_log' => $weightLogId,
        ];
        return view('weight_logs_update', $data);
    }
    
    public function update(WeightLogRequest $request){
        $form = $request->all();
        unset($form['_token']);
        WeightLog::where('id', $request->id)->update($form);
        return redirect('/weight_logs');
    }

    public function create(WeightLogRequest $request){
        $form = $request->all();
        WeightLog::create($form);
        return redirect('/weight_logs');
    }

    public function delete(Request $request){
        WeightLog::find($request->id)->delete();
        return redirect('/weight_logs');
    }

}
