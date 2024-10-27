
<?php  
require 'include/_header.php';
require 'include/descriptions.php';
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
                        <h1 class="h3 mb-0 text-gray-800 text-center">Description</h1>
                      
                    </div>
                    <?php if(isset($_GET['success'])): ?><div class="alert alert-success">Description ajouter !</div><?php endif ?>
                    <div class="container">
                    <form method="POST">
                        <?php 
                        $select=$DB->query('SELECT * FROM descriptions ORDER BY date_creation DESC LIMIT 1'); 
                        foreach($select as $selects):
                        ?>
                        <div class="form-group">
                            <label for="">Description  des Produits</label>
                            <textarea name="descriptions" id="" cols="30"  rows="10" class="form-control"><?= $selects->descriptions ?></textarea>   
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-info text-dark" name="add">Ajouter</button>
                        </div>
                        <?php endforeach ?>
                    </form>

                    </div>

            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>