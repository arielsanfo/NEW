<?php
class DB{
    private $host='localhost';
    private $username='root';
    private $password='';
    private $database="c2026801c_swetyshop";
    private $bd;

    public function __construct($host=null, $username=null,$password=null,$datababe=null){
            if($host != null){
                    $this->host=$host;
                    $this->username=$username;
                    $this->password=$password;
                    $this->database=$datababe;
            }
            try{
           $this->bd=new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->username,$this->password, 
           array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
                )); 
            }catch(PDOException $e){
                    die('Un problème est survenue lors de la connexion à la base de données! Contactez l\'équipe technique Dowhile ou redemarrer le serveur');
            }
    } 

    public function query($sql,$data=array()){
        $article=$this->bd->prepare($sql);
        $article->execute($data);
        return $article->fetchAll(PDO::FETCH_OBJ);

    }
    public function insert($sql,$data=array()){
        $article=$this->bd->prepare($sql);
        $article->execute($data);
        return $article;
    }
    
    public function row($sql,$data=array()){
        $article=$this->bd->prepare($sql);
        $article->execute($data);
        $totale=$article->rowCount();
        return $totale;

    }

}  
?>