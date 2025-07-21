<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CabinetUser extends Controller
{
    public function getView() {
        return view('lk.lk');
    }
}
