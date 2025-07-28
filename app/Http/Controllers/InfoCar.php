<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InfoCar extends Controller
{
    public function getInfoAuto(Request $request) {
      $cars = Car::with('users')->get();
      foreach ($cars as $car) {
          dump($car);
          foreach ($car->users as $user) {
              dump($user->name);
          }
      }
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
        if (!empty($validate_data_user)) {
            User::create([
                'name' => $validate_data_user['name'],
                'email'=>$validate_data_user['email'],
                'password'=>Hash::make($validate_data_user['password']),
            ]);

        }
        if (!empty($validate_data_car)) {
            Car::create([
                'model' => $validate_data_car['model'],
                'make_year' => $validate_data_car['make_year']
            ]);
        }
//        return redirect()->route('')->with("New user $validate_data_user[name] and new car $validate_data_car[model]
//        successful added");

    }
    public function getFormAdd() {
        return view();
        //created view
    }
}
