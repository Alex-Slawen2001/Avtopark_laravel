<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Drivers\DatabaseRecoveryPassword;

class RecoveryPassword extends Controller
{
    private $driver;
    public function __construct(DatabaseRecoveryPassword $driver) {
        $this->driver = $driver;
    }
    public function getFormRecovery() {
        return view('recovery.form_recovery',[
            'title'=>'Восстановление пароля',
        ]);
    }
    public function recoveryPassword(Request $request) {

      $this->driver->recoveryPassword($request);
}
}

