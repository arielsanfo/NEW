<?php
require 'class/bd.php';
require 'class/Auth.php';
require 'class/User.php';
require 'class/Product.php';
$DB=new DB();
$Product=new Product();
use Intervention\Image\ImageManager;
$manager=new ImageManager();
use App\Auth;
$pdo=new PDO('mysql:host=localhost;dbname=c2026801c_swetyshop','root','',[
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$auth= new Auth($pdo);
$user=$auth->user(); 
function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}

?>
