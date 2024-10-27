
<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
// titre du document
$title='Bienvenue sur Device-Soft';
// chargement du header
require 'include/admin/header.php'; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-start mb-4">
                        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Page ADMINISTRATEUR</h1>
                      
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="color: #997f19;" class="text-xs font-weight-bold  text-uppercase mb-1">Commandes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $Product->get_number_commande() ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      
                        <!-- Earnings (Monthly) Card Example -->
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="color: #997f19;" class="text-xs font-weight-bold  text-uppercase mb-1">
                                               catégorie</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $Product->get_number_categorie() ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div style="color: #997f19;" class="text-xs font-weight-bold  text-uppercase mb-1">
                                               Nombre de produit</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $Product->get_number_product() ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Content Row -->

               

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>