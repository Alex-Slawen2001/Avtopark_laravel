<?php
namespace App\Drivers;
use App\Contracts\iAuthDriver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class DatabaseAuthDriver implements iAuthDriver {
    public function getDataUser(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'required|string|min:8'
        ]);
        if (Auth::attempt([
            'name'=>$request['name'],
            'password'=>$request['password']

        ])) {
            return redirect()->intended('/lk/cab');

        }else {
            return back()->withErrors(['auth'=>"error authorization"])->withInput();
        }
    }
}
