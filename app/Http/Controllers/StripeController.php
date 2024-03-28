<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Stripe;
class StripeController extends Controller
{


    public function checkout(Request $request)
    {

            $cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->get()->toArray();
            $data = [];

            // Map the cart items to Stripe line items format
            $data['line_items'] = array_map(function ($item) {
                $product = Product::find($item['product_id']); // Retrieve product details
                return [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => $product->title, // Use product title from database
                        ],
                        'unit_amount' => $item['price'] * 100, // Convert to pence (smallest currency unit)
                    ],
                    'quantity' => $item['quantity'],
                ];
            }, $cart);

            $data['mode'] = 'payment';
            $data['success_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');

            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $session = \Stripe\Checkout\Session::create($data);

            // Add the total amount including any shipping discount if a coupon is applied
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            if(session('coupon')){
                $data['total'] = $total - session('coupon')['value']; // Apply coupon discount
            } else {
                $data['total'] = $total;
            }

            Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => session()->get('id')]);

            return redirect()->away($session->url);





    }

    public function success(Request $request)
    {
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->delete(); // Remove cart items
        request()->session()->flash('success','Your payment has been successfully processed via Stripe! Thank You');
        session()->forget('cart');
        session()->forget('coupon');
        return redirect()->route('home');
    }

    public function cancel(Request $request)
    {

        request()->session()->flash('success','There is some error while making payment');
        return redirect()->route('home');
    }




}
