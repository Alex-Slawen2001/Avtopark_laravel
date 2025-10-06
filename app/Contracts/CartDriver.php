<?php
namespace App\Contracts;
use Illuminate\Http\Request;

interface CartDriver {
    public function addToCart(array $data);
    public function updateCart(array $data);
    public function removeFromCart(array $data);
}
