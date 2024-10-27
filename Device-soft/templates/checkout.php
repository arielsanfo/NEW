<?php 
require 'include/_header.php';
require 'include/checkout.php';
if(!isset($_SESSION['panier'])){
    header('location: /shop');
    exit();
}
require 'include/header.php';
?>

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
    <form method="POST">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Facturation des adresse</h4>
                   

                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nom</label>
                            <input class="form-control border-info" name="name" type="text" placeholder="nom..." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control border-info" name="email" type="text" placeholder="@email.com" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>numéro de téléphone</label>
                            <input class="form-control border-info" name="phone" type="text" placeholder="numéro..." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adresse </label>
                            <input class="form-control border-info" name="address" type="text" placeholder="avenue..." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ville</label>
                            <input class="form-control border-info" name="city" type="text" placeholder="douala..." required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pays de Résidence</label>
                            <input class="form-control border-info" name="state" type="text" placeholder="cameroun..." required>
                        </div>
                        
                        
                       
                    </div>
                </div>
               
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0 bg-info">Total de la commande</h4>
                    </div>
                    
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">FCFA <?= $Product->get_total()?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" name="checkout" class="btn btn-lg btn-block btn-info text-white font-weight-bold my-3 py-3 bg-success">Passer la commande</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Checkout End -->


    <?php require 'include/footer.php'; ?>