<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Authorization extends Controller
{
    public function getFormAuth() {
        return view('auth.auth',[
            'title' => 'Авторизация',
        ]);
    }
    public function getDataUser(Request $request) {
        $validated = $request->validate([
            'name'=>'required|string|max:255',
            'password'=>'required|string|min:8'
        ]);
       if(Auth::attempt([
           'name'=>$validated['name'],
           'password' => $validated['password'],
        ])) {
           return redirect()->intended('/lk/cab');
       }else {
          return back()->withErrors(['auth'=>"error authorization"])->withInput();
       }
    }
}
