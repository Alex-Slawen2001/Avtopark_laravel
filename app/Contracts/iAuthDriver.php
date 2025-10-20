<?php
namespace App\Contracts;
use Illuminate\Http\Request;
interface iAuthDriver {
    public function getDataUser(Request $request);
}
