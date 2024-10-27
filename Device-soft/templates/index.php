<?php
require 'include/_header.php'; 
require 'include/header.php'; 
?>
    <!-- Navbar Start -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <div class="container-fluid">
        <div class="row border-top px-xl-8">
          
            <div class="container-fluid">
            
                <div id="header-carousel" class="mt-2 carousel slide" data-ride="carousel" style="border-style:20px">
                    <div class="carousel-inner" >
                        <div class="carousel-item active" style="height: 600px;" >
                            <img class="img-fluid" src="img/blog-4.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-" style="max-width: 800px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% de reduction pour votre 1er achats</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">EPICES DE OUFF</h3>
                                    <a href="/shop" class="btn text-danger py-3 px-5 bg-info font-italic bg-white font-weight-bold" style="border-radius:10px;">Acheter maintenant</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item active" style="height: 600px;" >
                            <img class="img-fluid" src="img/blog-4.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-" style="max-width: 800px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% de reduction pour votre 1er achats</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">EPICES DE OUFF</h3>
                                    <a href="/shop" class="btn text-danger py-3 px-5 bg-info font-italic bg-white font-weight-bold" style="border-radius:10px;">Acheter maintenant</a>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn bg-danger" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn bg-danger" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Featured End -->

   


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative  text-center text-md-right text-white mb-2 py-5 px-5 bg-info bg-warning" style="border-radius:10px;">
                    <img src="img/c642e164748 (1).png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-white mb-3">20% de reduction sur vos commandes</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-white">MEME PAR TELEPHONES PASSEY VOS COMMANDES</h1>
                        <a href="" class="btn bg-danger text-white font-weight-bold py-md-3 px-md-4 " style="border-radius:10px;">acheter manitenant</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-warning text-center text-md-left text-white mb-2 py-5 px-5" style="border-radius:10px;">
                    <img src="img/ddddd.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-white mb-3">20% de reduction sur vos commandes</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-white">MEME PAR ORDINATEUR PASSEY VOS COMMANDES</h1>
                        <a href="" class="btn bg-danger text-white py-md-3 px-md-4 font-weight-bold" style="border-radius:10px;">acheter maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5 bg-info text-info" style="border-radius:10px;"><span class="px-2" style="border-radius:10px;">Nouveau Produits</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <?php 
            $select=$Product->get_new_product(); 
            foreach($select as $selects):
            ?>
            <div class="col-lg-3 col-md-6 col-6 col-sm-6 pb-1">
                <div class="card product-item border-0 mb-1">
                    <?php 
                    $photo=$Product->get_picture($selects->id_produits); 
                    foreach($photo as $photos):
                    ?>
                    <div class="card-header product-img position-relative overflow-hidden bg-info border p-1">
                       <a href="<?= $router->generate('detail') ?>?id=<?= $selects->id_produits ?>">
                       <img class="img-fluid w-100" src="<?= $photos->photo_url ?>" alt="<?= $selects->titre ?>">
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
                               <h6 class="text-muted ml-2"><del> <?= number_format($selects->prix, 2,'.',',') ?></del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-info border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-white font-weight-bold p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au Panier</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- Products End -->
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-6">
                                           <a href="">
                                           <img src="img/OIP (20).jpeg" class="img-fluid" style="object-fit: cover;" alt="">
                                        </div>
                                           </a>
                                        <div class="col-6">
                                            <a href="">
                                            <img src="img/3b20928a406e624c6d7747398049d698 (1).png" style="object-fit: cover;" class="img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
 

   


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5 text-info bg-info" style="border-radius:10px;"><span class="px-2"style="border-radius:10px;">Les plus aimer</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        <?php 
            $select=$Product->get_loved_product(); 
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
                       <img class="img-fluid w-100" style="object-fit:contain;" src="<?= $photos->photo_url ?>" alt="">
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
                               <h6 class="text-muted ml-2"><del> <?= number_format($selects->prix, 2,'.',',') ?></del></h6>
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
        </div>
    </div>
    <!-- Products End -->
<!-- Offer Start -->
<div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative  text-center text-md-right text-white mb-2 py-5 px-5" style="background-color: #000;">
                    <img src="img/1326449_w5581h5581c1cx2799cy1838.jpg" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-white mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-white">curcuma</h1>
                        <a href="" class="btn bg-danger font-weight-bold text-white py-md-3 px-md-4" style="border-radius:10px;">acheter maintenant</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative text-center text-md-left text-white mb-2 py-5 px-5 border border-info p-5 mb-3" style="background:#000;">
                    <img src="img/moutarde.jpg" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-white mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold text-white">moutarde</h1>
                        <a href="" class="btn bg-danger  font-weight-bold text-white py-md-3 px-md-4" style="border-radius:10px;">acheter maintenant</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->
 <!-- Subscribe Start -->
 <div class="container-fluid  my-5 bg-info">
        <div class="row justify-content-md-center py-5 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="px-2" style="border-radius:10px;">Stay Updated</span></h2>
                    <p class="text-white">iiiiii</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Entrez votre e-mail ici" style="border-radius:10px;">
                        <div class="input-group-append" style="border-radius:10px;">
                            <button class="btn bg-white  px-4" style="color: #997f19;">Abonnez-vous</button>
                        </div>
                    </div>²
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
    <!-- Vendor Start -->
    <div class="container-fluid py-1">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <?php 
                    $select=$Product->get_partenaire(); 
                    foreach($select as $selects):
                    ?>
                    <div class="vendor-item border p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                   <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

<?php require 'include/footer.php'; ?>