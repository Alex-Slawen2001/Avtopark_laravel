<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

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
}
