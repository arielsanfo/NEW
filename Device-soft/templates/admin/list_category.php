<?php  
require 'include/_header.php';
// titre du document
$title='list of category';
// chargement du header
require 'include/admin/header.php'; 
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php if(isset($_GET['success'])): ?>
                            <div class="alert alert-success">Deleting the category successfully!</div>
                    <?php endif ?>
                    <?php if(isset($_GET['product'])): ?>
                            <div class="alert alert-success">category added successfully !</div>
                    <?php endif ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-center text-gray-800">List of category</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nom categorie</th>
                                            <th>Creer le</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php
                                        $select=$DB->query("SELECT * FROM categories ORDER BY date_creation DESC");
                                        foreach($select as $selects):
                                        ?>
                                        <tr>
                                            <td><?= $selects->titre  ?></td>
                                            <td><?= dateToFrench($selects->date_creation, 'l d M Y') ?></td>
                                            <td>
                                                <a href="<?= $router->generate('delete_categorie') ?>?id=<?= $selects->id_categories ?>" class="btn btn-danger"><i class="fa fa-trash"></i> delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                       
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php require 'include/admin/footer.php' ?>