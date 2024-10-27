<?php 
require 'include/_header.php';
require 'include/header.php'; 
?>

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <?php if(isset($_GET['success'])): ?><div class="container alert alert-success">produit supprimer du panier</div><?php endif ?>
        <?php if(isset($_SESSION['panier'])): ?>
            <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php   
                        foreach($_SESSION['panier'] as $val=>$quantite): 
                        ?>
                        <tr>
                            <td class="align-middle d-flex">
                                <?php 
                                $select=$Product->get_product($val);
                                $photo=$Product->get_picture($val); 
                                foreach($photo as $photos):
                                ?>
                                <img src="<?= $photos->photo_url ?>" alt="" class="object-fit-cover border rounded" style="width: 40px; height:50px;"> 
                                <?php endforeach ?>
                                <?php foreach($select as $selects): ?>
                                <span class="text-truncate d-block mt-3 ml-3" style="max-width: 100px;"><?= $selects->titre ?></span></td>
                            <td class="align-middle">
                                FCFA<?= number_format($selects->prix,2,'.',',') ?>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div> -->
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?= $quantite ?>">
                                    <!-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button> -->
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">FCFA <?= number_format($selects->prix * $quantite,2,'.',',') ?></td>
                            <td class="align-middle"><a href="<?= $router->generate('delete_cart') ?>?id=<?= $selects->id_produits ?>" class="btn text-white btn-sm btn-info"><i class="fa-solid fa-trash"></i></a></td>
                            <?php endforeach ?>
                        </tr>
                        <?php endforeach ?>
                      
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
               
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0 bg-info"> montant total du panier</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">total</h6>
                            <h6 class="font-weight-medium">FCFA <?= $Product->get_total() ?></h6>
                        </div>
                        <!-- <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div> -->
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">FCFA <?= $Product->get_total() ?></h5>
                        </div>
                        <a href="<?= $router->generate('checkout') ?>" class="btn btn-block btn-info text-white my-3 py-3 bg-success">Passer a la caisse</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        <?php if(!isset($_SESSION['panier'])): ?>
            <div class="alert alert-info container"> votre panier est vide !</div>
            <div class="container form-group"><a href="/shop" class="btn btn-primary text-white"><i class="bx bx-shopping-bag"></i> acheter maintenant !</a></div>
        <?php endif ?>
    </div>
    <!-- Cart End -->

<?php require 'include/footer.php';  ?>