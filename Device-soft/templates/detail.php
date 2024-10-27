<?php 
require 'include/_header.php';
require 'include/header.php';
$id=htmlspecialchars($_GET['id']);
$detail=$Product->get_product($id);
foreach($detail as $details):
?>
    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <?php
                         $picture=$Product->get_picture($id); 
                         foreach($picture as $pictures):
                            $id_save=$pictures->id_photos;
                         ?>
                        <div class="carousel-item active" style="height: 600px;">
                            <img class="img-fluid object-fit-contain" src="<?= $pictures->photo_url ?>" alt="Image">
                        </div>
                         <?php endforeach ?>   
                         <?php
                         $picture=$Product->get_different_picture($id,$id_save); 
                         foreach($picture as $pictures):
                         ?>
                        <div class="carousel-item">
                            <img  src="<?= $pictures->photo_url ?>" alt="Image">
                        </div>
                        <?php  endforeach?>
                        
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold mb-5"><?= $details->titre ?></h3>
                <div class="mb-5">

                <?php if($details->reduction == 0): ?>
                                <h1>FCFA <?= number_format($details->prix, 2,'.',',') ?></h1>
                            <?php endif ?>
                            <?php if($details->reduction > 0): ?>
                                <div class="d-flex">
                                <h1>FCFA<?= number_format($details->prix-($details->prix * $details->reduction/100), 2,'.',',') ?></h1>
                               <h3 class="text-muted ml-2"><del> <?= number_format($details->prix, 2,'.',',') ?></del></h3>
                                </div>
                            <?php endif ?>
                </div>
               
                <div class="d-flex mb-5">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-1" name="size">
                            <label class="custom-control-label" for="size-1">XS</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-2" name="size">
                            <label class="custom-control-label" for="size-2">S</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-3" name="size">
                            <label class="custom-control-label" for="size-3">M</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-4" name="size">
                            <label class="custom-control-label" for="size-4">L</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="size-5" name="size">
                            <label class="custom-control-label" for="size-5">XL</label>
                        </div>
                    </form>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                    <form>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-1" name="color">
                            <label class="custom-control-label" for="color-1">Noir</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-2" name="color">
                            <label class="custom-control-label" for="color-2">Blanc</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-3" name="color">
                            <label class="custom-control-label" for="color-3">Rouge</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-4" name="color">
                            <label class="custom-control-label" for="color-4">Bleu</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-5" name="color">
                            <label class="custom-control-label" for="color-5">Vert</label>
                        </div>
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-center bg-light border mt-5">
                        <a onclick="add_cart(<?= $details->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                    </div>
              
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Description du produit</h4>
                        <p><?= $details->descriptions ?></p>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Tu pourrais aussi aimé ceci</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php 
                    $select=$Product->get_random_product(); 
                    foreach($select as $selects):
                    ?>
                    <div class="card product-item border-0">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="<?= $selects->titre ?>">
                       </a>
                    </div>
                    <?php endforeach ?>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><?= $selects->titre ?></h6>
                            <div class="d-flex justify-content-center">
                            <?php if($selects->reduction == 0): ?>
                                <h6>$ <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>$ <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del> <?= number_format($selects->prix, 2,'.',',') ?></del></h6>
                            <?php endif ?>
                        </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                    </div>
                    </div>
                    <?php endforeach ?>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <?php endforeach  ?>

   <?php require 'include/footer.php'; ?>