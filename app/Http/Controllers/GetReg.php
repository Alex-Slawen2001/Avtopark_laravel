<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Drivers\DatabaseRegDriver;

class GetReg extends Controller
{
    private $driver;
    public function __construct(DatabaseRegDriver $driver)
    {
        $this->driver = $driver;
    }

    public function showReg() {
        return view('reg.reg',[
            'title' => 'Регистрация',

        ]);
    }

    public function register(Request $request) {
        return $this->driver->register($request);
    }
}

