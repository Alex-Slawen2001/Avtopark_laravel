<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Drivers\DatabaseTimeDriver;

class Time extends Controller
{
    protected $driver;
    public function __construct(DatabaseTimeDriver $driver)
    {
        $this->driver = $driver;
    }

    public function getFormTime() {
        return view('time.formTime',[
            'title'=>'Form get car in time'
        ]);
    }
    public function getTime(Request $request) {
        $this->driver->getTime($request);
    }
    public function getTimeInterval(Request $request) {
        $this->getTimeInterval($request);
    }
    public function getFormSetTime() {
        return view('time.setTime',[
            'title'=>'Обноление времени у машины',
        ]);
    }
    public function setTime(Request $request) {
       $this->driver->setTime($request);
    }

}
