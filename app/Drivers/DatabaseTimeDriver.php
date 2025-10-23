<?php
namespace App\Drivers;
use App\Contracts\iTime;
use Illuminate\Http\Request;
use App\Models\Car;

class DatabaseTimeDriver implements iTime {
    public function getTime(Request $request)
    {
       $timeFree = $request->input('time');
       $time = Car::where('time','>=',$timeFree)->get();
       if (!$time) {
           return response()->json(['info'=>'Free car in this time not found'],100);
       }
       $relations = ['users','cars'];
       $time->load($relations);
       return response()->json($time);
    }
}
