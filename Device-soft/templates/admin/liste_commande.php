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
        <h1 class="h3 mb-0 text-gray-800 text-center">Liste des commandes</h1>

    </div>
    <?php if(isset($_GET['success'])): ?>
                            <div class="alert alert-success">Produit supprimé avec succes!</div>
                    <?php endif ?>
                    <?php if(isset($_GET['product'])): ?>
                            <div class="alert alert-success">produit ajouter avec succes!</div>
                    <?php endif ?>
    <div class="container-fluid">
    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Numéro</th>
                                            <th>Total</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Adresse</th>
                                            <th>ville</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php 
                                        $select=$DB->query('SELECT * FROM commande ORDER BY date_creation DESC'); 
                                        foreach($select as $selects):
                                        ?>
                                        <tr>
                                            <td><?= $selects->id_commande ?></td>
                                            <td>$ <?= $selects->total ?></td>
                                            <td><?= $selects->email ?></td>
                                            <td><?= $selects->telephone ?></td>
                                            <td><?= $selects->adresse ?></td>
                                            <td><?= $selects->citys ?></td>
                                            <td><?= $selects->telephone ?></td>
                                            <td>
                                                <a href="delete_produit" class="btn btn-danger"><i class="fa fa-trash"></i> supprimé</a>
                                                <a href="/detail_order?id=<?= $selects->id_commande ?>" class="btn btn-info"><i class="fa fa-eye"></i> détaille</a>
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