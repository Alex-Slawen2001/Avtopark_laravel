<?php
namespace App\Drivers;
use App\Contracts\InfoCarDriver;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\Routing\Loader\load;

class DatabaseInfoCar implements InfoCarDriver {
    public function  getInfoAuto()
    {
        $cars = Car::with('users')->get();
        foreach ($cars as $car) {
            dump($car);
            foreach ($car->users as $user) {
                dump($user->name);
            }
        }
    }
    public function addAutoUser(array $data1, array $data2)
    {
            User::create([
                'name' => $data1['name'],
                'email'=> $data1['email'],
                'password' => Hash::make($data1['password'])
            ]);

            Car::create([
               'model' => $data2['model'],
                'make_year' => $data2['make_year']
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
       $info = $user->load($relations);
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

