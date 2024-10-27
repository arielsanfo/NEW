<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?? 'Ics creation' ?></title>
    <link href="images/coeur.png" rel="icon">
    <link href="images/coeur.png" rel="apple-touch-icon">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion bg-info" style="background-color: #997f19;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin">

                <div class="sidebar-brand-text mx-3 text-white">CHRONO<sup>Epices</sup></div>
            </a>




            
            <li class="nav-item">
                <a class="nav-link" href="/liste_commande">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Toute les commandes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add_product">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un produit</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add_category">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter une catégorie</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/add_category">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter une sous catégorie</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_size">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter une taille</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_color">
                    <i class="fas fa-plus"></i>
                    <span>Adjouter une couleur</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_link">
                    <i class="fas fa-plus"></i>
                    <span>Ajouter un Lien</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_description">
                    <i class="fas fa-plus"></i>
                    <span>Description</span></a>
            </li>
            <hr>
            <li class="nav-item">
                <a class="nav-link" href="/list_product">
                    <i class="fas fa-list"></i>
                    <span>Liste des produits</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list_category">
                    <i class="fas fa-list"></i>
                    <span>Liste des catégorie</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list_size">
                    <i class="fas fa-list"></i>
                    <span>Liste des tailles</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list_color">
                    <i class="fas fa-list"></i>
                    <span>Liste des Couleurs</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #997f19;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                 
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                   
                      

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small">Admin</span>
                                <img class="img-profile rounded-circle" src="img/R (1).png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Deconnexion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

