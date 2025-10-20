<?php
namespace App\Contracts;
use Illuminate\Http\Request;

interface iRegDriver {
    public function register(Request $request);
}
