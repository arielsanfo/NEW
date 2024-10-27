<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Mon profil</title>

  <!-- slider stylesheet -->
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<style>
    .active:hover{
        background:  pink;
    }
</style>
<body>
<div class="modal fade" id="pp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#40E0D0;">
        <h5 class="modal-title text-white" id="exampleModalLongTitle" style="font-size:14px;"><i class="bx bxs-file-image"></i>&nbsp;Modification de la photo de profil</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="photo" class="form-control" required>
           
     </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-secondary" name="pp">Modifier</button>
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuler</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="offcanvas offcanvas-start"  tabindex="-1" id="menu" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-dark" id="offcanvasExampleLabel">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    
    <div class="container">
        <p><a href="/post" class="text-dark"><i class="bx bx-plus"></i> Ajouter un post</a></p>
        <p><a href="" class="text-dark"><i class="bx bx-show"></i> Mes annonces</a></p>
        <p><a href="/courrier_post" class="text-dark"><i class="bx bx-show"></i> Mes courriers (0)</a></p>
        <p><a href="/liste_post" class="text-dark"><i class="bx bx-menu"></i> Liste des posts</a></p>
        <p><a href="" class="text-dark"><i class="bx bx-history"></i> Historique de paiement</a></p>
        <p><a href="" class="text-dark"><i class="bx bx-menu"></i> Liste des taches</a></p>
        <p><a href="/logout" class="text-danger"><i class="bx bx-log-out"></i>&nbsp;Deconnexion</a></p>
    </div>
  </div>
</div>


<nav class="navbar navbar-light bg-secondary justify-content-between p-1">
<i class="bx bx-menu text-white" onclick="menu()"></i>
  <a href="profil_freelance" class="navbar-brand text-white">&nbsp;Quick<span class="text-info">freelance</span></a>
  <a href=""><i class="bx bx-cog text-white"></i></a>
  <a href="/logout" class="text-white"><i class="bx bx-log-out"></i>&nbsp;Deconnexion</a>
</nav>
