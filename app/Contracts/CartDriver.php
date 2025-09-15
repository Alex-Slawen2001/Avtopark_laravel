<?php
namespace App\Contracts;
use Illuminate\Http\Request;

interface CartDriver {
    public function addToCart(Request $request);
    public function updateCart(Request $request);
    public function removeFromCart(Request $request);
}
