<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Device-Soft</title>
    <meta name="Content-Type" content="UTF-8">
<meta name="Content-Language" content="en">
<meta name="Description" content="Luxury African designs with a modern touch">
<meta name="Subject" content="Luxury African designs with a modern touch">
<meta name="Copyright" content="Icscreation">
<meta name="Identifier-Url" content="https://www.icscreation.com">
<meta name="Reply-To" content="contact@icscreation.com">
<meta name="Revisit-After" content="1 day">
<meta name="Robots" content="all">
<meta name="Distribution" content="global">
<meta name="Geography" content="USA">
<meta name="Category" content="shopping">
<meta name="Identifier-Url" content="https://www.icscreation.com">
<meta name="Reply-To" content="contact@icscreation.com">
<meta name="image" content="img/device.jpg" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://icscreation.com/" />
    <meta property="og:title" content="icscreation" />
    <meta property="og:description"
        content="Luxury African designs with a modern touch" />
    <meta property="og:image" content="img/device.jpg" />
    <!-- Twitter -->
    <meta property="twitter:card" content="icscreation" />
    <meta property="twitter:url" content="https://icscreation.com/" />
    <meta property="twitter:title" content="icscreation" />
    <meta property="twitter:description"
        content="Luxury African designs with a modern touch" />
    <meta property="twitter:image" content="img/device.jpg" />
    <link href="img/favicon.ico" rel="icon">
    <link href="img/favicon.ico" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="css/all.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="js/manifest.json" rel="manifest">
    <link href='css/boxicons.css' rel='stylesheet'>

</head>

<body>
    
<div id="add_success" style="z-index: 99999999999999; background-color:#997f19;"
        class="mt-30 toast position-fixed  top-30 end-30 align-items-center text-white border-10 bg-info" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            Produits ajouter au Panier
            <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <button type="button" class="btn me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"><i class="bx bx-x text-white"></i></button>
        </div>
</div>

    <!-- Topbar Start -->
    
            <?php 
                $link=$DB->query('SELECT * FROM liens ORDER BY date_creation DESC LIMIT 1');
                foreach($link as $links):
                 ?>
            
            <?php endforeach ?>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="<?= $router->generate('index') ?>" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold  px-3 mr-1">
                    <img src="img/device.jpg" width="80" alt=""></h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="search" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control "style="border-radius:20px;" value="<?= $_GET['q'] ?? '' ?>" placeholder="Rechercher un produit ici..." required>
                        <div class="input-group-append">
                            <button class="input-group-text bg-info text-white" style="border-radius:18px;">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="<?=  $router->generate('login') ?>" class="btn border">
                <i class="fa-solid fa-user text-info"></i>
                </a>
                <a href=<?= $router->generate('cart') ?> class="btn border">
                <i class="fa-solid fa-cart-shopping text-info"></i>
                    <span class="badge" id="count"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <nav class="container navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold  px-3 mr-1"><img src="img/device.jpg" width="70" alt=""></h1>
                    </a>
                    <button type="button" class="navbar-toggler btn" data-toggle="collapse" data-target="#navbarCollapse">
                        <i class="bx bx-menu bx-md tex-dark"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between p-2" id="navbarCollapse">
                    <a href="/new_in" class="nav-item nav-link text-dark font-weight-bold" style="font-size: 19px;">Accueil</a>
                            <?php 
                            $select=$DB->query('SELECT * FROM categories');  
                            foreach($select as $selects):
                            ?>
                            <a href="/category?ca=<?= $selects->id_categories ?>" class="nav-item nav-link text-dark text-uppercase font-weight-bold" style="font-size: 13px;"><?= $selects->titre ?></a>
                            <?php endforeach ?>
                    </div>
                </nav>