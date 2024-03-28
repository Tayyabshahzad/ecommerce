<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Stripe;
class StripeService {

    protected $order; // Declare $order property
    public function __construct($order)
    {
        $this->order = $order;


    }
    public function checkout()
    {

            $cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->get()->toArray();
            $data = [];
            $data['line_items'] = array_map(function ($item) {
                $product = Product::find($item['product_id']);
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
            $data['success_url'] = route('thank.you');
            $data['cancel_url'] = route('payment.cancel');

            \Stripe\Stripe::setApiKey(config('stripe.sk'));
            $session = \Stripe\Checkout\Session::create($data);
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
            return $session->url;

    }
    public function success()
    {

        $order = $this->order;
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->delete(); // Remove cart items

        session()->forget('cart');
        session()->forget('coupon');
        return view('frontend.pages.thank-you',compact('order'));
    }

    public function cancel(Request $request)
    {

        request()->session()->flash('success','There is some error while making payment');
        return redirect()->route('home');
    }
}
