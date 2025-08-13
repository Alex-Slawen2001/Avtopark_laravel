<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class Time extends Controller
{
    public function getFormTime() {
        return view('time.formTime',[
            'title'=>'Form get car in time'
        ]);
    }
    public function getTime(Request $request) {
        $timeFree = $request->input('time');
        $time = Car::where('time',$timeFree)->get();
        if (!$time) {
            return response()->json(['info'=>'Free car in this time not found'],100);
        }
        $relations = ['users','cars'];
        $time->load($relations);
        return response()->json($time);
    }

}
