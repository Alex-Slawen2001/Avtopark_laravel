<?php
namespace App\Drivers;
use App\Contracts\CartDriver;
use App\Models\Car;
class DatabaseCartDriver implements CartDriver
{
    public function addToCart(array $data): array
    {
        $id = $data['id_serve'] ?? null;
        if (!$id) {
            return ['success' => false, 'message' => 'Invalid car ID'];
        }
        $car = Car::find($id);
        if (!$car) {
            return ['success' => false, 'message' => 'Car not found'];
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id' => $car->id,
                'model' => $car->model,
                'year' => $car->year,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        return ['success' => true, 'message' => 'Car added to cart successfully!'];
    }
    public function updateCart(array $data): array
    {
        $id = $data['id'] ?? null;
        $quantity = $data['quantity'] ?? 1;
        if (!$id) {
            return ['success' => false, 'message' => 'Invalid car ID'];
        }
        $cart = session()->get('cart', []);
        if (!isset($cart[$id])) {
            return ['success' => false, 'message' => 'Car not found in cart'];
        }
        $cart[$id]['quantity'] = max(1, $quantity); // Ensure quantity is at least 1
        session()->put('cart', $cart);
        return ['success' => true, 'message' => 'Cart updated successfully!'];
    }
    public function removeFromCart(array $data): array
    {
        $id = $data['id'] ?? null;
        if (!$id) {
            return ['success' => false, 'message' => 'Invalid car ID'];
        }
        $cart = session()->get('cart', []);
        if (!isset($cart[$id])) {
            return ['success' => false, 'message' => 'Car not found in cart'];
        }
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return ['success' => true, 'message' => 'Car removed from cart successfully!'];
    }
}
