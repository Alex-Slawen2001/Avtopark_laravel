<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart');
        return view('carts.cart', compact('cart'));
    }
    public function postCart() {
        return view('forms.form_add_carts',[
            'title' => 'Тестовая форма для отправки POST',
        ]);
    }
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
                "id" => $car->id, // Используем правильный ID товара
                "model" => $car->model,
                "quantity" => 1, // Инициализируем количество
            ];
        }

        // Сохраняем обновленную корзину в сессии
        session()->put('cart', $cart);

        // Возвращаем пользователя на предыдущую страницу с сообщением об успехе
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request) {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if (!isset($cart[$id]['quantity'])) {
                $cart[$id]['quantity'] = 1; // Инициализируем количество, если его нет
            } else {
                $cart[$id]['quantity'] = $quantity; // Обновляем количество
            }
            session()->put('cart', $cart);
        }
        return response()->json(['success' => true, 'message' => 'Cart updated successfully!']);
    }
    public function removeFromCart(Request $request)
    {
        $id = $request->input('id_serve');
        $cart = session()->get('cart',[]);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
        return response()->json(['success' => true, 'message' => 'Product removed from cart successfully!']);
    }
}
