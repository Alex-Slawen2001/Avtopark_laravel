<?php
namespace App\Contracts;
use Illuminate\Http\Request;
interface InfoCarDriver {
    public function getInfoAuto(array $data);
    public function addAutoUser(array $data);
    public function getInfoUser($name);
    public function getInfoCar($model);
}
