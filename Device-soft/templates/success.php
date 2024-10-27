<?php 
require 'include/_header.php';
require 'include/header.php'; 
// destruction du panier
unset($_SESSION['panier']);
?>
<div class="d-flex justify-content-center">
<div class="col-lg-5 mb-5 mt-5">
                <div class="contact-form">
                    <div class="form-group d-flex justify-content-center bx-tada">
                        <img src="img/thanks.png" width="100" alt="">
                    </div>
                    <div>
                        <h5 class="text-center text-success">success</h5>
                        <p>Your order has been successfully validated. Device-Soft thanks you for your loyalty</p>
                    </div>
                   
                            <button class="btn btn-primary btn-block py-2 px-4 text-white" onclick="window.location.assign('mes_commandes')"  type="submit" id="sendMessageButton">
                               <i class="bx bx-shopping-bag"></i> mes commandes</button>
                        
                </div>
            </div>
</div>


<?php require 'include/footer.php'; ?>