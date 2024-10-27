<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
// titre du document
$title='Detail of order';
$id=htmlspecialchars($_GET['id']);
// chargement du header
require 'include/admin/header.php'; 
?>
<!-- Begin Page Content -->
<div class="container-fluid">
<?php   $commande=$DB->query('SELECT * FROM commande WHERE id_commande=:id',array('id'=>$id)); 
foreach($commande as $commandes):
    ?>
    <!-- Page Heading -->
    <div class="">
        <h1 class="h3 mb-0 text-gray-800 text-center">Order detail</h1>
        <hr>
        <h5 class=" mb-0 text-gray-800 text-center">Total: $ <?= $commandes->total ?></h5>
        <h5 class=" mb-0 text-gray-800 text-center">Email: <?= $commandes->email ?></h5>
        <h5 class=" mb-0 text-gray-800 text-center">Phone number: <?= $commandes->telephone ?></h5>
        <h5 class=" mb-0 text-gray-800 text-center">City: <?= $commandes->citys ?></h5>
        <h5 class=" mb-0 text-gray-800 text-center">State: <?= $commandes->states ?></h5>
        <h5 class=" mb-0 text-gray-800 text-center">Name: <?= $commandes->nom ?></h5>
        <hr>
    </div>
    <?php if(isset($_GET['success'])): ?>
                            <div class="alert alert-success">Product removal successfully completed!</div>
                    <?php endif ?>
                    <?php if(isset($_GET['product'])): ?>
                            <div class="alert alert-success">product added successfully !</div>
                    <?php endif ?>
    <div class="container-fluid">
    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>product name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                      
                                            $produit=$DB->query('SELECT * FROM produit_commande WHERE id_commande=:id',array('id'=>$commandes->id_commande)); 
                                        foreach($produit as $produits):
                                            $select=$DB->query('SELECT * FROM produits WHERE id_produits=:id',array('id'=>$produits->id_produit)); 
                                            foreach($select as $selects):
                                        ?>
                                        <tr>
                                        <?php 
                                        $photo=$DB->query('SELECT * FROM photo WHERE id_produits=:id ORDER BY date_creation LIMIT 1',array('id'=>$selects->id_produits)); 
                                        foreach($photo as $photos):
                                        ?>
                                            <td><img src="<?= $photos->photo_url ?>" width="50" alt=""></td>
                                            <?php endforeach ?>
                                            <td><?= $selects->titre ?></td>
                                            <td>$ <?= $selects->prix ?></td>
                                            <td><?= $produits->quantite ?> </td>
                                            <td>$ <?= $produits->quantite * $selects->prix ?> </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <?php endforeach ?>
                                        <?php endforeach ?>
                                       
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

    </div>

</div>
<!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>