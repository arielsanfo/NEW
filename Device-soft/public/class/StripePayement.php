<?php 
namespace Ics;
use Stripe\Checkout\Session;
use Stripe\Stripe;
class StripePayement{
    public function __construct(private string $clientSecret){
            Stripe::setApiKey($this->clientSecret);
            Stripe::setApiVersion('2023-10-16');
    }
    public function startPayement(){
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
              # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
              'price' => '{{PRICE_ID}}',
              'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'localhost/success',
            'cancel_url' =>'localhost',
          ]);
          header("HTTP/1.1 303 See Other");
          header("Location: " . $checkout_session->url);

    }
}