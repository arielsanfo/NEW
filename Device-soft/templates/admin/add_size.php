
<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
require 'include/add_size.php';
// titre du document
$title='Add Size';
// chargement du header
require 'include/admin/header.php'; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="">
                        <h1 class="h3 mb-0 text-gray-800 text-center">Ajouter une Taille</h1>
                    </div>
                    <div class="container">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Taille</label>
                            <input type="text" class="form-control" name="titre" placeholder="Enter the size">
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-info text-dark" name="ajout">Ajouter</button>
                        </div>
                    </form>

                    </div>

            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>