<?php 

namespace App\Models;

require_once __DIR__ . '/../Database/Database.php';

use PDOException;
use PDO;

class Product{

    private $id;
    private $title;
    private $price;
    private $photo;
    private $category_id;
    private $desc;
    private $reference;
    private $fichetech;
    protected $db;

    protected $table = 'products';


    public function __construct(){
        $this->db= \App\Databases\Database::getInstance();
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $val) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($val);
            }
        }
    }

    public function getAll(){
        $con = $this->db;
        $request = 'SELECT `products`.`id`, `title`, `price`, `photo`, `category_id`, `desc`, `reference`, `fichetech`, `name` FROM '.$this->table.' JOIN `category` ON `products`.`category_id` = `category`.`id`';
        $rows = $con->query($request);
        return $rows->fetchAll();
    }
    public function getProductByCat_ID(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table . ' WHERE category_id = ?';
        $stmt = $con->prepare($request);
        $stmt->execute([$this->category_id]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    public function getProductByID(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table . ' WHERE id = ?';
        $stmt = $con->prepare($request);
        $stmt->execute([$this->id]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public function create(){
        try {
            $con = $this->db;
            $sql = "INSERT INTO $this->table( title, price, photo, category_id, `desc`, reference, fichetech) 
            VALUES (:title, :price, :photo, :category_id, :desc, :reference, :fichetech)";
            $req = $con->prepare($sql);
            $req->bindValue(':title',$this->title);
            $req->bindValue(':price',$this->price);
            $req->bindValue(':photo',$this->photo);
            $req->bindValue(':category_id',$this->category_id);
            $req->bindValue(':desc',$this->desc);
            $req->bindValue(':reference',$this->reference);
            $req->bindValue(':fichetech',$this->fichetech);
            $req->execute();
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    }
    function delete(){
        try {
            $con = $this->db;
            $sql = "DELETE from $this->table where id = ?";
            $stmt = $con->prepare($sql);
            $stmt->execute([$this->id]);
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            return $row;
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    }

    public function update(){
        try {
            $con = $this->db;
            $sql = "UPDATE $this->table 
                    SET title=:title,price=:price, photo=:photo, category_id=:category_id, `desc`=:desc, reference=:reference, fichetech=:fichetech
                    WHERE id = :id";
            $req = $con->prepare($sql);
            $req->bindValue(':title',$this->title);
            $req->bindValue(':price',$this->price);
            $req->bindValue(':photo',$this->photo);
            $req->bindValue(':category_id',$this->category_id);
            $req->bindValue(':desc',$this->desc);
            $req->bindValue(':reference',$this->reference);
            $req->bindValue(':fichetech',$this->fichetech);
            $req->bindValue(':id',$this->id);
            $req->execute();
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set the value of desc
     *
     * @return  self
     */ 
    public function setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Get the value of reference
     */ 
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @return  self
     */ 
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get the value of fichetech
     */ 
    public function getFichetech()
    {
        return $this->fichetech;
    }

    /**
     * Set the value of fichetech
     *
     * @return  self
     */ 
    public function setFichetech($fichetech)
    {
        $this->fichetech = $fichetech;

        return $this;
    }
}