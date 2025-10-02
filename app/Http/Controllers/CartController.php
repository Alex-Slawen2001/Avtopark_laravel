<?php

namespace App\Http\Controllers;

use App\Drivers\DatabaseCartDriver;
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
    protected DatabaseCartDriver $cartDriver;
    public function __construct(DatabaseCartDriver $cartDriver)
    {
        $this->cartDriver = $cartDriver;
    }
    public function addToCart(Request $request) {

        $valid = $request->validate([
            'id_serve' => 'required|integer|exists:cars,id',
        ]);
        $result = $this->cartDriver->addToCart($valid);
        if ($result['success']) {
            return redirect()->back()->with('success',$result['message']);
        }
        return redirect()->back()->with('error',$result['message']);
    }

    public function updateCart(Request $request) {
        $valid = $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);
        $result = $this->cartDriver->updateCart($valid);
        if ($result['success']) {
            return response()->json($result);
        }
        return response()->json($result, 400);
    }


    public function removeFromCart(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
        ]);
        $result  = $this->cartDriver->removeFromCart($valid);
        if ($result['success']) {
            return response()->json($result);
        }
        return response()->json($result, 400);
    }
}




