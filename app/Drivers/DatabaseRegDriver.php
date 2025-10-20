<?php
namespace App\Drivers;
use App\Contracts\iRegDriver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseRegDriver implements iRegDriver {
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $user = User::create([
           'name' => $validated['name'],
           'email' => $validated['email'],
           'password' => Hash::make($validated['password'])
        ]);
        Auth::login($user);
        return redirect()->route('home')->with('success','Регистрация успешна!');

    }
}
