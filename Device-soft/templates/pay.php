<?php
require 'include/_header.php';
foreach($_SESSION['panier'] as $val=>$quantite){
  $array=[];
  // selection des produit par id de la session
  $select=$Product->get_product($val);
  // parcourons les produits
  foreach($select as $selects){
   $titre=$selects->titre;
  } 
}
$stripe = new \Stripe\StripeClient('sk_test_51O3nNrINXwUeJTi8zvrSRtLZ7avHrUWhbcz5uGpZgvzcg6UzMp6JHyGzLF6M2ztSJpbzgWIcarjSDtCl3nzxEnHC0002WIU87s');
$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => $titre,
      ],
      'unit_amount' => $Product->get_totals(),
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'http://localhost/success',
  'cancel_url' => 'http://localhost/cancel',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);