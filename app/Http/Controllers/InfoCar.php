<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Drivers\DatabaseInfoCar;

class InfoCar extends Controller
{
    protected $infoCar;
    public function __construct() {
        $this->infoCar = new DatabaseInfoCar();
    }
    public function getInfoAuto() {
     $this->infoCar->getInfoAuto();
    }
    public function addAvtoUser(Request $request) {
        $validate_data_user = $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:40',
            'password'=>'required|string|confirmed|min:8'
        ]);
        $validate_data_car = $request->validate([
            'model'=>'required|string|max:30',
            'make_year'=>'required|string|max:20'
        ]);
        $this->infoCar->addAutoUser($validate_data_user,$validate_data_car);

    }
    public function getFormAdd() {
        return view('forms.form_new_info',[
            'title'=>'Добавить нового пользователя и машину',
        ]);
    }

    public function getInfoUser(Request $request) {
        $userName = $request->input('name');
        $this->infoCar->getInfoUser($userName);

    }
    public function getInfoCar(Request $request) {
       $modelCar = $request->input('model');
        $this->infoCar->getInfoCar($modelCar);
    }

}

