<?php 

use App\Models\Categories;

class CategoriesController{
   
    
    public function categorylist(){
        ob_start();
        $categorie = new Categories;
        $undercategory = $categorie->getAllCatAndName();  
        $category = $categorie->getCat();


        require_once __DIR__ .'/../Vues/CategoryList.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 
/**
 * ajax = createCategory
 * ajaxCreateUnderCat = createUnderCategory
 * ajaxUnderCategory = readUnderCategory from current catrgory
 */
    public function create(){
        if(isset($_POST['ajax'])){
            // Creation de categorie en ajax
            $categorie = new \App\Models\Categories();
            $categorie->hydrate($_POST);
            $categorie->createCat();
            echo json_encode(['id' => $categorie->getId(), 'name' =>$categorie->getName()]);
            exit();
        }
        else if(isset($_POST['ajaxCreateUnderCat'])){
            // creation de sous categorie en ajax
            $categorie = new \App\Models\Categories();
            $categorie->hydrate($_POST);
            $categorie->createUnderCat();
            echo json_encode(['id' => $categorie->getId(), 'name' =>$categorie->getName(),'cat_id' =>$categorie->getCat_id()]);
            exit();
        }
        else if(isset($_POST['ajaxUnderCategory'])){
            // Fonction qui affiche les sous category dans la creation
            $categorie = new \App\Models\Categories();
            $categorie->hydrate($_POST);
            $categorieList = $categorie->getUnderCatById();
            echo json_encode($categorieList);
            exit();
        }
    }

    public function update(){
        if(!empty($_POST)){
            $cat = new \App\Models\Categories();
            $cat->hydrate($_POST);
            var_dump($_POST);
            $cat->update();
            header('Location: index.php?page=categories/categorylist&sucess=true');
            exit();
        }
    }
    public function delete(){
        $id=$_GET['id'] ;
        if($id){
            $cat=new \App\Models\Categories() ;
            $cat-> setId($id);
            $cat->delete();
            header('Location: index.php?page=categories/categoryList');
            exit();
        }
    }
}