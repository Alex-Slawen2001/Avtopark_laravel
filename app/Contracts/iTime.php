<?php
namespace App\Contracts;
use Illuminate\Http\Request;
interface iTime {
    public function getTime(Request $request);
    public function getTimeInterval(Request $request);
    public function setTime(Request $request);
}
