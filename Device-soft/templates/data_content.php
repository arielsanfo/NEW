<?php
require 'include/_header.php';
if(isset($_POST['cent'])):
    extract($_POST);
?>
 <?php 
                    $select=$Product->get_price_product(0,100); 
                    foreach($select as $selects):
                    ?>
                    <div class="col-lg-3 col-md-6 col-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="">
                       </a>
                    </div>
                    <?php endforeach ?>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                      <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>" class="text-decoration-none">
                      <h6 class="text-truncate mb-3"><?= $selects->titre ?></h6>
                        <div class="d-flex justify-content-center">
                            <?php if($selects->reduction == 0): ?>
                                <h6>FCFA <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>FCFA <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del>FCFA200.00</del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>

<?php endif ?>
<?php 
if(isset($_POST['deux'])):
    extract($_POST);
?>
 <?php 
                    $select=$Product->get_price_product(100,200); 
                    foreach($select as $selects):
                    ?>
                    <div class="col-lg-3 col-md-6 col-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="">
                       </a>
                    </div>
                    <?php endforeach ?>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                      <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>" class="text-decoration-none">
                      <h6 class="text-truncate mb-3"><?= $selects->titre ?></h6>
                        <div class="d-flex justify-content-center">
                            <?php if($selects->reduction == 0): ?>
                                <h6>FCFA <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>FCFA <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del>FCFA200.00</del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>

<?php endif ?>
<?php 
if(isset($_POST['trois'])):
    extract($_POST);
?>
 <?php 
                    $select=$Product->get_price_product(200,300); 
                    foreach($select as $selects):
                    ?>
                    <div class="col-lg-3 col-md-6 col-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="">
                       </a>
                    </div>
                    <?php endforeach ?>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                      <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>" class="text-decoration-none">
                      <h6 class="text-truncate mb-3"><?= $selects->titre ?></h6>
                        <div class="d-flex justify-content-center">
                            <?php if($selects->reduction == 0): ?>
                                <h6>FCFA <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>FCFA <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del>FCFA300.00</del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>

<?php endif ?>
<?php 
if(isset($_POST['quatre'])):
    extract($_POST);
?>
 <?php 
                    $select=$Product->get_price_product(300,400); 
                    foreach($select as $selects):
                    ?>
                    <div class="col-lg-3 col-md-6 col-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="">
                       </a>
                    </div>
                    <?php endforeach ?>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                      <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>" class="text-decoration-none">
                      <h6 class="text-truncate mb-3"><?= $selects->titre ?></h6>
                        <div class="d-flex justify-content-center">
                            <?php if($selects->reduction == 0): ?>
                                <h6>FCFA <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>FCFA <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>

<?php endif ?>
<?php 
if(isset($_POST['cinq'])):
    extract($_POST);
?>
 <?php 
                    $select=$Product->get_price_product(400,500); 
                    foreach($select as $selects):
                    ?>
                    <div class="col-lg-3 col-md-6 col-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-4">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="">
                       </a>
                    </div>
                    <?php endforeach ?>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                      <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>" class="text-decoration-none">
                      <h6 class="text-truncate mb-3"><?= $selects->titre ?></h6>
                        <div class="d-flex justify-content-center">
                            <?php if($selects->reduction == 0): ?>
                                <h6>FCFA <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>FCFA <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del>FCFA300.00</del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>

<?php endif ?>