<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Drivers\DatabaseAuthDriver;

class Authorization extends Controller
{
    private $driver;
    public function __construct(DatabaseAuthDriver $driver) {
        $this->driver = $driver;
    }
    public function getFormAuth() {
        return view('auth.auth',[
            'title' => 'Авторизация',
        ]);
    }

    public function getDataUser(Request $request) {
       return $this->driver->getDataUser($request);

    }
}
