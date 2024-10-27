<?php 
require 'include/_header.php';
require 'include/header.php'; ?>

<!-- Shop Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <!-- Price Start -->
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Filtrer par prix</h5>
                <form>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" name="price" class="custom-control-input" checked id="price-all">
                        <label class="custom-control-label" for="price-all">Tous les prix</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" name="price" class="custom-control-input" id="price-1">
                        <label class="custom-control-label" for="price-1" onclick="change(400)">FCFA0 - FCFA400</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" name="price" class="custom-control-input" id="price-2">
                        <label class="custom-control-label" for="price-2" onclick="change(500)">FCFA200 - $500</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3 bg-info">
                        <input type="radio" name="price" class="custom-control-input" id="price-3">
                        <label class="custom-control-label" for="price-3" onclick="change(300) ">FCFA200 - FCFA300</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="radio" name="price" class="custom-control-input" id="price-4">
                        <label class="custom-control-label" for="price-4" onclick="change(400) ">$300 - $400</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between bg-info">
                        <input type="radio" name="price" class="custom-control-input" id="price-5">
                        <label class="custom-control-label" for="price-5" onclick="change(500)">$400 - $500</label>
                    </div>
                </form>
            </div>
            <!-- Price End -->

         
        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                
                <div class="container-fluid pt-5">
                 <div class="row px-xl-5 pb-3" id="data_content">
                    <?php 
                    $select=$Product->get_random_product(); 
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
                                <h6>$ <?= number_format($selects->prix, 2,'.',',') ?></h6>
                            <?php endif ?>
                            <?php if($selects->reduction > 0): ?>
                                <h6>$ <?= number_format($selects->prix-($selects->prix * $selects->reduction/100), 2,'.',',') ?></h6>
                               <h6 class="text-muted ml-2"><del>$123.00</del></h6>
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