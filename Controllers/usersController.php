<?php 

use App\Models\Users;

class UsersController{


    public function userlist(){
        // Recuperation de tout les utilisateurs pour les afficher
        ob_start();
        $usersinfo = new Users;
        $users = $usersinfo->getAll();
        require_once __DIR__ .'/../Vues/userlist.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 
    public function useredit(){
        $id = $_GET['id'];
        // On recupere l'id de l'utilisateur a editer
            $usersinfo = new Users;
            $usersinfo->setId($id);
            // On lui assigne ses informations
            $user = $usersinfo->getById();

        ob_start();
        require_once __DIR__ .'/../Vues/UserUpdate.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 

    public function create(){
        if(!empty($_POST)){
            // On crée un utilisateur
            $user = new \App\Models\Users();
            $user->hydrate($_POST);
            $user->create();
            header('Location: index.php?page=auth/login');
            exit();
        }
    }

    public function update(){
        if(!empty($_POST)){
        // Update de l'utilisateur
            $user = new \App\Models\Users();
            $user->hydrate($_POST);
            $user->update();
            header('Location: index.php');
            exit();
        }
    }

    public function updateadmin(){
        // Update d'un utilisateur admin
        if(!empty($_POST)){
            $user = new \App\Models\Users();
            $user->hydrate($_POST);
            $user->UpdateAdmin();
            header('Location: index.php?page=users/userlist');
            exit();
        }
    }

    public function delete(){
        $id=$_GET['id'] ;
        if($id){
            $user=new \App\Models\Users() ;
            $user-> setId($id) ;
            $user->delete() ;
            header('Location: index.php?page=users/userlist');
            exit();
        }
    }
}