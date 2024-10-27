<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
// titre du document
$title='Add description';
// chargement du header
require 'include/admin/header.php'; 
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="">
        <h1 class="h3 mb-0 text-gray-800 text-center">List of product</h1>

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
                                            <th>Photo</th>
                                            <th>Nom produit</th>
                                            <th>prix</th>
                                            <th>reduction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $select=$DB->query('SELECT * FROM produits ORDER BY date_creation DESC'); 
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
                                            <td><?= $selects->prix ?> FCFA</td>
                                            <td><?= $selects->reduction ?> %</td>
                                            <td>
                                                <a href="delete_produit?id=<?= $selects->id_produits ?>" class="btn btn-danger"><i class="fa fa-trash"></i> delete</a>
                                                <a href="modifier_produit?id=<?= $selects->id_produits ?>" class="btn btn-warning"><i class="fa fa-edit"></i> edit</a>
                                                <a href="/size?id=<?= $selects->id_produits ?>" class="btn btn-primary">Size</a>
                                                <a href="" class="btn btn-info"><i class="fa fa-eye"></i> show detail</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                       
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>

    </div>

</div>
<!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>