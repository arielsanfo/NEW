<?php
namespace App;
use PDO;
class Auth {

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function user() : ?User
    {
        if(session_status()=== PHP_SESSION_NONE){
            session_start();
        } 
         //retour de la variable $user
             $ids=$_SESSION['user'] ?? null;
             if($ids === null){
                 return null;
             }
             $query=$this->pdo->prepare('SELECT * FROM users WHERE email =?');
             $query->execute([$ids]);
             $user=$query->fetchObject(User::class);
             if($user == false){
                $query=$this->pdo->prepare('SELECT * FROM users WHERE email =?');
                $query->execute([$ids]);
                $user=$query->fetchObject(User::class);
                if($user == false){
                    return NULL;
                }else{
                    return $user;
                }
             }else{
                return $user;
             }
           
    }
    public function login (string $login, string $mdp)
    {
        // find user
        $query=$this->pdo->prepare('SELECT * FROM users WHERE email=:username');
        $query->execute(['username' => $login]);
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user= $query->fetch();
        
        if($user === false){
            // find user
        $query=$this->pdo->prepare('SELECT * FROM users WHERE email=:username');
        $query->execute(['username' => $login]);
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user= $query->fetch();
            if($user === false ){
                    return null;
                }else{
                    if(password_verify($mdp, $user->passwords))
                    {
                        if(session_status()=== PHP_SESSION_NONE){
                            session_start();
                        } 
                       $_SESSION['user']=$user->email;
                        return $user;
                    }       
                       
                    return null;
                }

            }else{
                if(password_verify($mdp, $user->passwords))
            {
                if(session_status()=== PHP_SESSION_NONE){
                    session_start();
                } 
               $_SESSION['user']=$user->email;
                return $user;
            }       
            }
            
       


    }  

}