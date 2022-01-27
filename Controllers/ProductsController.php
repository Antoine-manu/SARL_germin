<?php 

use App\Models\Product;
use App\Models\Categories;

class ProductController{

    

    public function createproduct(){
        ob_start();
            // Fonction de route vers la creation de produit
            $category = new Categories;
            // On crée une categorie
            $category = $category->getCat();
            // On recupere toutes les categories
            $underCategory = new Categories;
             // On crée une categorie
            $underCategory = $underCategory->getUnderCat();
            // On recupere toutes les sous categories
        require_once __DIR__ .'/../Vues/createproduct.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 
    public function catalogue(){
        ob_start();
        // Route vers le catalogue
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                // verif de si on veut regarder le catalogue d'une categorie uniquement
            $product = new Product;
            $product = $product->setCategory_id($id);
            $product = $product->getProductByCat_ID();
            // recuperation de tout les produits correspondant a la categorie
            if($product==null){
                // Si on ne nous retourne pas de produits, nous somme alors dans une categorie et non une sous categorie, il n'y a donc pas de produit, on recupere
                // donc ici tout les produits de toutes les sous categories 
                $category = new Categories;
                $category = $category->setCat_id($id);
                $category = $category->getUnderCatById();
                $ProductArray = [];
                foreach($category as $c){ 
                    // Son met dans un tableau tout les produits de toutes les categories
                    $Allproduct = new Product;  
                    $Allproduct = $Allproduct->setCategory_id($c->id);
                    array_push($ProductArray,$Allproduct->getProductByCat_ID());
                }
                $ProductArray = array_merge(...$ProductArray);
            }
            }else{
                // Ici on ne recupere pas d'id donc nous somme dans le catalogue global, on recupere tout les produits en ligne 
                $all = true;
                $category = new Categories;
                $category = $category->getCat();
            }
            
        require_once __DIR__ .'/../Vues/catalogue.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
        
    } 
    public function singleProduct(){
        ob_start();
        
        $id = $_GET['id'];
        // On recupere l'id du produit en question dans l'url
        $productinfo = new Product;
        $productinfo->setId($id);
        $product = $productinfo->getProductByID();
        // on lui donne ses info
        require_once __DIR__ .'/../Vues/SingleProduct.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 
    public function productlist(){
        // Route vers la liste des produits
        ob_start();
        $product = new Product;
        $product = $product->getAll();  
        // On recupere tout les produits 

        require_once __DIR__ .'/../Vues/ProductList.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 
    public function productEdit(){
        ob_start();

        // Edition d'un produit
        
        $id = $_GET['id'];
        $productinfo = new Product;
        $productinfo->setId($id);
        $product = $productinfo->getProductByID();
        // on recupere l'id dans l'url du produit et on lui assigne ses informations
        $category = new Categories;
        $allcategory = $category->getCat();
        $underCategory = new Categories;
        // on recupere les sous categories pour les afficher en selection
        $underCategory = $underCategory->getUnderCat();
        $thisundercat = $category->setId($product[0]->category_id);
        // on recupere la sous categorie du produit pour la mettre en default
        $thisundercat = $thisundercat->getCatById();
        $thiscat = $category->setId($thisundercat[0]->cat_id);
        $thiscat = $thiscat->getCatById();
        // De meme pour la categorie principale


        require_once __DIR__ .'/../Vues/ProductEdit.php';
        $content = ob_get_clean();
        require_once __DIR__ .'/../Templates/template.php';
    } 

    public function create(){
        if(!empty($_POST)){
            // On verifie que le post est passé
            $files = pathinfo($_FILES['photo']['name']);
            // On recupere la photo
            $upload_dir = 'assets/upload';
            // On split la photo pour recuperer le name et l'extension
            $extension = $files['extension'];
            $name = $_POST['reference'];
            $link = $upload_dir.'/'.$name.'.'.$extension ;
            // On renome le fichier par la reference du produit 
            if(move_uploaded_file($_FILES['photo']['tmp_name'],$link)){
                echo 'telechargement fait';
                $product = new \App\Models\Product();
                $product->hydrate($_POST);
                $product->setPhoto($extension);
                // On stockera l'extension dans photo 
                var_dump($product);
                $product->create();
                // On crée le produit
                header('Location: index.php?page=main/pannel&product=true');
                exit();
            }else{
                @unlink($link);
            }

            
            
        }
    }

    public function update(){
        if(!empty($_POST)){
            var_dump($_POST,$_FILES);
            if($_FILES['photo']['tmp_name']!=null){
                // Ici l'image change 
                $files = pathinfo($_FILES['photo']['name']);
                $upload_dir = 'assets/upload';
                // On split la photo pour recuperer le name et l'extension
                $extension = $files['extension'];
                $name = $_POST['reference'];
                $link = $upload_dir.'/'.$name.'.'.$extension ;
                // On renome le fichier par la reference du produit 
                if(move_uploaded_file($_FILES['photo']['tmp_name'],$link)){
                    echo 'telechargement fait';
                    $product = new \App\Models\Product();
                    $product->hydrate($_POST);
                    $product->setPhoto($extension);
                    // On stockera l'extension dans photo
                    var_dump($product);
                    $product->update();
                    header('Location: index.php?page=product/productlist');
                    exit();
                }
            }
            else{
                echo 'telechargement pas a faire';
                $product = new \App\Models\Product();
                // Ici l'image ne change pas donc on envoie juste le post dans l'update sans reupload
                $product->hydrate($_POST);
                var_dump($product);
                $product->update();
                header('Location: index.php?page=product/productlist');
                exit();
            }
        }
    }
    public function delete(){
        $id=$_GET['id'] ;
        if($id){
            $product=new \App\Models\Product() ;
            $product-> setId($id);
            $product->delete();
            header('Location: index.php?page=product/productlist');
            exit();
        }
    }
    
}