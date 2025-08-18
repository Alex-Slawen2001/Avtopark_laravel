<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RecoveryPassword extends Controller
{
    public function getFormRecovery() {
        return view('recovery.form_recovery');
    }
    public function recoveryPassword(Request $request) {
       $email = $request->input('email');
       $user = User::where('email',$email)->first();
       if (!$user) {
           return response()->json(['error'=>'email_not_found'],404);
       }else {
        $token = app('auth.password.broker')->createToken($user);
        \Mail::send('email.reset.password',['token'=>$token,'user'=>$user],function($message) use ($user) {
            $message->to($user->email);
            $message->subject('Восстановление пароля');
        });
       }
       return response()->json(['message'=>'Письмо для сброса пароля отправлено']);
    }
}

