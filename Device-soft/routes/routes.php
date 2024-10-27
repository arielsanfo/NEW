<?php
// route pour l'application de camhebergement 
$router->map('GET|POST','/','index','index');
$router->map('GET|POST','/shop','shop','shop');
$router->map('GET|POST','/checkout','checkout','checkout');
$router->map('GET|POST','/detail','detail','detail');
$router->map('GET|POST','/contact','contact','contact');
$router->map('GET|POST','/cart','cart','cart');
$router->map('GET|POST','/login','login','login');
$router->map('GET|POST','/register','register','register');
$router->map('GET|POST','/recover_password','recover_password','recover_password');
$router->map('GET|POST','/verification','verification','verification');
$router->map('GET|POST','/profil','profil','profil');
$router->map('GET|POST','/add_cart','add_cart','add_cart');
$router->map('GET|POST','/success','success','success');
$router->map('GET|POST','/delete_cart','delete_cart','delete_cart');
$router->map('GET|POST','/search','search','search');
$router->map('GET|POST','/offline','offline','offline');
$router->map('GET|POST','/data_content','data_content','data_content');
$router->map('GET|POST','/category','category','category');
$router->map('GET|POST','/pay','pay','pay');
$router->map('GET|POST','/logout','logout','logout');
$router->map('GET|POST','/mes_commandes','mes_commandes','mes_commandes');
$router->map('GET|POST','/new_in','new_in','new_in');
$router->map('GET|POST','/politique','politique','politique');
$router->map('GET|POST','/delete_account','delete_account','delete_account');
$router->map('GET|POST','/edit_profil','edit_profil','edit_profil');

// routes vers l'admin
$router->map('GET|POST','/admin','admin/admin','admin');
$router->map('GET|POST','/add_product','admin/add_product','add_product');
$router->map('GET|POST','/add_category','admin/add_category','add_category');
$router->map('GET|POST','/add_link','admin/add_link','add_link');
$router->map('GET|POST','/add_description','admin/add_description','add_description');
$router->map('GET|POST','/list_product','admin/list_product','list_product');
$router->map('GET|POST','/list_category','admin/list_category','list_category');
$router->map('GET|POST','/delete_categorie','admin/delete_categorie','delete_categorie');
$router->map('GET|POST','/delete_produit','admin/delete_produit','delete_produit');
$router->map('GET|POST','/liste_commande','admin/liste_commande','liste_commande');
$router->map('GET|POST','/detail_order','admin/detail_order','detail_order');
$router->map('GET|POST','/add_size','admin/add_size','add_size');
$router->map('GET|POST','/add_color','admin/add_color','add_color');
$router->map('GET|POST','/list_size','admin/list_size','list_size');
$router->map('GET|POST','/delete_size','admin/delete_size','delete_size');
$router->map('GET|POST','/delete_color','admin/delete_color','delete_color');
$router->map('GET|POST','/list_color','admin/list_color','list_color');
$router->map('GET|POST','/size','admin/size','size');