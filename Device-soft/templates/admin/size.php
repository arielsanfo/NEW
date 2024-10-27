
<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
require 'include/ajout_categorie.php';
$id=htmlspecialchars($_GET['id']);
// titre du document
$title='Define Size';
// chargement du header
require 'include/admin/header.php'; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="">
                        <h1 class="h3 mb-0 text-gray-800 text-center">Definir une taille du produit</h1>
                    </div>

                    <div class="container mt-5">
                    <form class="mt-5" method="POST">
                        <?php 
                        $select=$DB->query('SELECT * FROM sizes ORDER BY date_creation'); 
                        foreach($select as $selects):
                        ?>
                            <div class="form-group">
                                <input type="checkbox" name="size[]" id="">&nbsp;<?= $selects->titre ?>
                            </div>
                        <?php endforeach ?>
                        <div class="form-group d-flex justify-content-start">
                            <button class="btn btn-warning text-dark" name="ajout">Definir maintenant</button>
                        </div>
                    </form>

                    </div>

            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>