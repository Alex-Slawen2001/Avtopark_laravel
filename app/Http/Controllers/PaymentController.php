<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'description' => 'Оплата через Stripe',
            ]);
            return response()->json(['clientSecret' => $paymentIntent->client_secret]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function getFormPay() {
        return view('pay_system.pay_form',[
            'title'=>'форма для заполнения данных платежа',
        ]);
    }
}
