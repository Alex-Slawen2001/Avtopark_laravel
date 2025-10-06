<?php
namespace App\Drivers;
use App\Contracts\InfoCarDriver;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;
use function Symfony\Component\Routing\Loader\load;

class DatabaseInfoCar implements InfoCarDriver {
    public function  getInfoAuto(array $data)
    {
        $cars = Car::with('users')->get();
        foreach ($cars as $car) {
            dump($car);
            foreach ($car->users as $user) {
                dump($user->name);
            }
        }
    }
    public function addAutoUser(array $data)
    {
            User::create([
                'name' => $data['name'],
                'email'=> $data['email'],
                'password' => Hash::make($data['password'])
            ]);

            Car::create([
               'model' => $data['model'],
                'make_year' => $data['make_year']
            ]);

        return redirect()->route('home')->with("New user and car successful added");
    }
    public function getInfoUser($name)
    {
       $user = User::where('name',$name)->first();
       if (!$user) {
           return response()->json(['error'=>"User with name $name not found"]);
       }
       $relations = ['users','cars'];
       $info = load($relations);
       return response()->json($info);
    }
    public function  getInfoCar($model)
    {
        $car = Car::where('model',$model)->first();
        if (!$car) {
            return response()->json(['error'=>'This car not found']);
        }
        $relations = ['users','cars'];
         $info = load($relations);
         return response()->json($info);
    }
}

