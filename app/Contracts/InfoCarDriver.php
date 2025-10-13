<?php
namespace App\Contracts;
use Illuminate\Http\Request;
interface InfoCarDriver {
    public function getInfoAuto(array $data);
    public function addAutoUser(array $data1,array $data2);
    public function getInfoUser($name);
    public function getInfoCar($model);
}
