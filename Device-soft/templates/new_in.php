<?php 
require 'include/_header.php';
require 'include/header.php'; ?>

<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->


        <!-- Shop Product Start -->
        <div class="col-lg-12 col-md-12">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Nouveau produit</span></h2>
        </div>
            <div class="row pb-3">
                
                <div class="container-fluid pt-5">
                 <div class="row px-xl-5 pb-3" id="data_content">
                    <?php 
                    $select=$Product->get_products(); 
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
                               <h6 class="text-muted ml-2"><del>FCFA220.00</del></h6>
                            <?php endif ?>
                        </div>
                      </a>
                    </div>
                    <div class="card-footer d-flex justify-content-center bg-light border">
                        <a onclick="add_cart(<?= $selects->id_produits ?>)" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au apnier</a>
                    </div>
                </div>
            </div>
                    <?php endforeach ?>
                </div>
                </div>
                <div class="col-12 pb-1">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-3">
                            <?php  
                            $pages=$Product->get_page();
                            if($pages > 1):
                            for ($i = 1; $i <= $pages; $i++): 
                                                            ?>
                            <li class="page-item active"><a class="page-link" href="<?= $router->generate('shop') ?>?page=<?= $i ?>">1</a></li>
                            <?php endfor ?>
                            <?php endif?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
<?php require 'include/footer.php'; ?>