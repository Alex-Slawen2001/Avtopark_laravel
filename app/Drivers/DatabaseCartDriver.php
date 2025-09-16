<?php
namespace App\Drivers;
use App\Contracts\CartDriver;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use App\Models\Car;

class DatabaseCartDriver implements  CartDriver{
    public function addToCart(Request $request) {
        $valid = $request->validate([
            'id_serve' => 'required|integer|exists:cars,id',
        ]);

        $id = $request->input('id_serve');

        if ($valid) {
            $car = Car::findOrFail($id);
        }
        if (!$car) {
            return redirect()->back()->with('error', 'Car not found!');
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "make_year" => $car->make_year,
                "id" => $car->id,
                "model" => $car->model,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function updateCart(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart',[]);
        if (isset($cart[$id])) {
            if (!isset($cart[$id]['quantity'])) {
                $cart[$id]['quantity'] = 1;
            }else {
                $cart[$id]['quantity'] = $quantity;
            }
            session()->put('cart',$cart);
        }
        return response()->json(['success' => true, 'message' => 'Cart updated successfully!']);
    }
    public function  removeFromCart(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart',[]);
        if (isset($cart[$id])) {
            if (!isset($cart[$id]['quantity'])) {
                if ($cart[$id]['quantity'] == 1) {
                    unset($cart[$id]);
                    session()->put('cart',$cart);
                }else if ($cart[$id]['quantity'] > 1) {
                    $cart[$id]['quantity']--;
                    session()->put('cart',$cart);
                }
            }
        }
        return response()->json(['message' => 'successful remove']);
    }

}
