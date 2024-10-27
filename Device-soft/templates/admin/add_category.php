
<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
require 'include/ajout_categorie.php';
// titre du document
$title='Add Category';
// chargement du header
require 'include/admin/header.php'; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="">
                        <h1 class="h3 mb-0 text-gray-800 text-center">Ajouter une catégorie</h1>
                      
                    </div>

                    <div class="container">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Nom des categorie</label>
                            <input type="text" class="form-control" name="titre" placeholder="Entrez le nom d'une catégorie ">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn bg-info text-dark" name="ajout">Ajouter</button>
                        </div>
                    </form>

                    </div>

            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>