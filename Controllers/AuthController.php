<?php

use App\Models\Users;

Class AuthController {

    public function login(){
        ob_start();
            if(isset($_GET['error'])){
                $status = true;
            }else{
                $status = false;
            }
        require_once __DIR__ .'/../Vues/login.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    }

    public function register(){
        ob_start();
        require_once __DIR__ .'/../Vues/register.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    }

    public function account(){
        ob_start();
        if(isset($_SESSION)){

            $userinfo = new Users;
            $userinfo = $userinfo->setEmail($_SESSION['user']['email']);
            $user = $userinfo->getUserByEmail();
        }
        require_once __DIR__ .'/../Vues/Account.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    }

    public function UpdateAccount(){
        ob_start();
        if(isset($_SESSION)){

            $userinfo = new Users;
            $userinfo = $userinfo->setEmail($_SESSION['user']['email']);
            $user = $userinfo->getUserByEmail();
        }
        require_once __DIR__ .'/../Vues/UpdateAccount.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    }

    public function logout(){
        $_SESSION = array();
        header('Location: index.php');
    }

    public function getAuth(){
        if(isset($_POST['submit'])){
            // Connextion, on verifie l'envoie du post
            $user = new Users();
            $user->hydrate($_POST);
            $userinfo = $user->getUserByEmail();
            // On genere un utilisateur avec le post envoyé

            if($userinfo){
                if(password_verify($_POST['password'],$userinfo->password)){
                    // Si ses informations correspondent avec ceux de la base de données on demmare une session avec ses information
                    echo "Connexion effectuée";
                    $_SESSION['user']['email']=$userinfo->email;
                    $_SESSION['user']['role']=$userinfo->role;
                    $_SESSION['user']['name']=$userinfo->name;
                    header('Location: ../index.php');
                            exit();
                        }
            }else{
                header('Location: ../index.php?page=auth/login&error=true');
                exit();
            }
        };
    }

}