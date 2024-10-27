
<?php  
require 'include/_header.php';
// require 'include/script_admin.php';
require 'include/ajout_produit.php'; 
// titre du document
$title='Add product';
// chargement du header
require 'include/admin/header.php'; 
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="">
                        <h1 class="h3 mb-0 text-gray-800 text-center">Ajouter un produit</h1>
                    </div>
                    <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                                        <label for="">catégorie</label>

                                        <select name="categorie" id="" class="custom-select" required>
                                        <?php 
                                        $categorie=$DB->query('SELECT * FROM categories ORDER BY titre'); 
                                        foreach($categorie as $categories):
                                        ?>
                                            <option value="<?= $categories->id_categories ?>"><?= $categories->titre ?></option>
                                        <?php endforeach ?>
                                        </select>
                                    </div>
                        <div class="form-group">
                            <label for="">Nom du produit</label>
                            <input type="text" class="form-control" name="titre" placeholder="Entrer le nom du produit" required>
                        </div>
                        <div class="form-group">
                            <label for="">Prix (FCFA)</label>
                            <input type="number" class="form-control" name="prix" placeholder="Entrer le prix" required>
                        </div>
                        <div class="form-group">
                            <label for="">Reduction (FCFA)</label>
                            <input type="number" class="form-control" name="reduction" placeholder="Entrer la reduction" required>
                        </div>
                        <div class="form-group">
                            <label for="">Coleur</label>
                            <select name="color" id="" class="custom-select" required>
                            <?php 
                                        $couleur=$DB->query('SELECT * FROM couleur ORDER BY titre'); 
                                        foreach($couleur as $couleurs):
                                        ?>
                                            <option value="<?= $couleurs->titre ?>"><?= $couleurs->titre ?></option>
                                        <?php endforeach ?>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" placeholder="Entrer la description du produit" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">produit</label>
                            <input type="file" name="photo[]" class="form-control" multiple required>                        
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-info text-dark" name="ajout">Ajouter</button>
                        </div>
                    </form>

                    </div>

            </div>
            <!-- End of Main Content -->
<?php require 'include/admin/footer.php'; ?>