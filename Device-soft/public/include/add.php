<?php
if(!empty($_POST)){
    extract($_POST);
        if(isset($_POST['add'])){
           $ids = array_keys($_SESSION['panier']);
            $code=mt_rand(111111111,999999999);
            $article = $DB->query('SELECT * FROM post WHERE id_post IN (' . implode(',', $ids) . ')');
            $DB->insert('INSERT INTO orders (codes,names,email,phone,country,addresse,postcode) VALUES (?,?,?,?,?,?,?)',array(
                $code,
                $name,
                $email,
                $telephone,
                $country_name,
                $address,
                $post
            ));
            $mails='';
    if(isset($_SESSION['panier'])){
    $ids = array_keys($_SESSION['panier']);
    $montant=0;
    $number = $DB->row('SELECT * FROM post WHERE id_post IN (' . implode(',', $ids) . ')');
    if($number > 0){
    $article = $DB->query('SELECT * FROM post WHERE id_post IN (' . implode(',', $ids) . ')');
    foreach($article as $articles){
        $montant=$montant+$articles->prix * $_SESSION['panier'][$articles->id_post];
    $mails.='<tr>
        <td class="product-des" data-title="Description">
            <p class="product-name"><a href="#">'. $articles->titre.'</a></p>
        </td>
        <td class="price" data-title="Price"><span>$ '.number_format($articles->prix,2,'.',',') .'</span></td>
        <td class="qty" data-title="Qty"><!-- Input Order -->
            <div class="input-group">
                
               '.$_SESSION['panier'][$articles->id_post].'
                
            </div>
        </td>
        <td class="total-amount" data-title="Total"><span>$ '. number_format($articles->prix * $_SESSION['panier'][$articles->id_post],2,'.',',') .'</span></td>
    </tr>';
     }
    }
    if($number == 0){

        $mails.='<div class="alert alert">empty cart !</div></tbody></table>';
    }
}

            $transport = (new Swift_SmtpTransport('mail.palletclearancecenterllc.com', 465, 'ssl'))
            ->setUsername('contact@palletclearancecenterllc.com')
            ->setPassword('M@diba1997123')
            ;
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            // Create a message
            $message = (new Swift_Message('Checkout'))
              ->setFrom(['contact@palletclearancecenterllc.com' => 'pallet clearance center llc'])
              ->setBody('
                    <html>
                    <body>
                      <div>
                     <p>Order Confirmation !</p>
                            
                     <p>Dear '.$name.'</p>
                         
                          <p>We are writing to confirm that we have received your order.</p>
                          <p>Thank you for choosing us for your purchase needs.</p>
                          <p>Your order details are as follows:</p>
                          <div>
                          <table class="table shopping-summery" style="border:2px solid;">
						<thead>
							<tr class="main-hading" style="border:2px solid;">
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
							</tr>
						</thead>
						<tbody>
                        '.$mails.'
                          </div>
                         <p>Before we can process your order, we kindly ask you to inform us which payment method you would like to use to complete the purchase. You can choose between the following options:
                            </p>
                            <p>
                            Bank Transfer<br>
                            Credit Card Payment<br>
                            Zelle <br>

                            </p>
                            <p>Once we receive your payment, we will begin processing your order immediately. Please note that it may take up to 24 hours to prepare your order for shipping. We will notify you as soon as your order has been shipped and forward you the tracking number.
                            </p>
                            <p>Thanks you for choosing us and we look forward to serving you again in the future.
                            </p>
                            <p>Best regards,
                            Pallet Clearance Center
                            +1(909)616-5414 (text or call)
                            Supplier of general pallets of merchandise, including customer returns, overstock, and Walmart liquidation pallets.
                            </p>
                            <p>
                            Important Notice:<br>
Please be advised that we are using only one (1) domain name<br>
@Palletclearancecenterllc.com<br>
Any communication sent outside our domain pretending and using our company name is absolutely a fraudster.
Our facebook account is only one (1):<br>
https://www.facebook.com/palletclearancecenterllc?mibextid=LQQJ4d <br>Our bank account will not be changed easily. If someone notify the change of bank account, please call directly to
909-616-5414 for verification.</p>
                      </div>
                    </body>
                  </html>
              ','text/html');
            
            // Send the message
            $failedRecipients = [];
            $numSent = 0;
            $to = [$email];
            
            foreach ($to as $address => $name)
            {
              if (is_int($address)) {
                $message->setTo($name);
              } else {
                $message->setTo([$address => $name]);
              }
            
              $numSent += $mailer->send($message, $failedRecipients);
            }
            foreach($article as $articles){
                // produit commande
                $DB->insert('INSERT INTO produit_commande (id_post,quantite,codes) VALUES (?,?,?)',array(
                    $articles->id_post,
                    $_SESSION['panier'][$articles->id_post],
                    $code
                ));
            }
            $transport = (new Swift_SmtpTransport('mail.palletclearancecenterllc.com', 465, 'ssl'))
            ->setUsername('contact@palletclearancecenterllc.com')
            ->setPassword('M@diba1997123')
            ;
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            // Create a message
            $message = (new Swift_Message('New commande check your dashboard'))
              ->setFrom(['contact@palletclearancecenterllc.com' => 'pallet clearance center llc'])
              ->setBody('
                    <html>
                    <body>
                      <div>
                     <p>There is a new commande !</p>
                             
                          <p>eamil :'.$email.'</p>
                          <p>Name: '.$name.'</p>
                          <p>Country name: '.$country_name.'</p>
                         
                      </div>
                    </body>
                  </html>
              ','text/html');
            
            // Send the message
            $failedRecipients = [];
            $numSent = 0;
            $to = ['support@palletclearancecenterllc.com'];
            
            foreach ($to as $address => $name)
            {
              if (is_int($address)) {
                $message->setTo($name);
              } else {
                $message->setTo([$address => $name]);
              }
            
              $numSent += $mailer->send($message, $failedRecipients);
            }

            // envoie du message par mail
            unset($_SESSION['panier']);
            header('location: /success');
            exit();
        }
}