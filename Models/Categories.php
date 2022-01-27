<?php 

namespace App\Models;

require_once __DIR__ . '/../Database/Database.php';

use PDOException;
use PDO;

class Categories {
    
    private $name;
    private $id;
    private $cat_id;

    protected $db;

    protected $table = 'category';


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


    public function getAllCat(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table ;
        $rows = $con->query($request);
        return $rows->fetchAll();
    }
    public function getAllCatAndName(){
        $con = $this->db;
        $request = 'SELECT `category`.`id`,`category`.`name`,`category`.`cat_id`,`c`.`name` as `maincat_name`,`c`.`id` as `maincat_id` FROM `category`,`category` as `c` WHERE `category`.`cat_id`=`c`.`id` ';
        $rows = $con->query($request);
        return $rows->fetchAll();
    }
    public function getCat(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table .' WHERE cat_id IS NULL';
        $rows = $con->query($request);
        return $rows->fetchAll();
    }

    public function Update(){
        try {
            $con = $this->db;
            if(!empty($this->cat_id)){
                $sql = "UPDATE $this->table 
                SET name=:name,cat_id=:cat_id
                WHERE id = :id";
                $req = $con->prepare($sql);
                $req->bindValue(':name',$this->name);
                $req->bindValue(':id',$this->id);
                $req->bindValue(':cat_id',$this->cat_id);
            }else{
                $sql = "UPDATE $this->table 
                SET name=:name
                WHERE id = :id";
                $req = $con->prepare($sql);
                $req->bindValue(':name',$this->name);
                $req->bindValue(':id',$this->id);
            }
            $req->execute();
            
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    
    }

    public function getUnderCat(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table .' WHERE cat_id IS NOT NULL';
        $rows = $con->query($request);
        return $rows->fetchAll();
    }
    public function getUnderCatById(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table .' WHERE cat_id = ?';
        $stmt = $con->prepare($request);
        $stmt->execute([$this->cat_id]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }
    public function getCatById(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table .' WHERE id = ?';
        $stmt = $con->prepare($request);
        $stmt->execute([$this->id]);
        $row = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;
    }

    public function createCat(){
        try {
            $con = $this->db;
            $sql = "INSERT INTO $this->table( name) 
            VALUES (:name)";
            $req = $con->prepare($sql);
            $req->bindValue(':name',$this->name);
            if($req->execute()){
                $this->id = $this->db->lastInsertId();
            }
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    }
    public function createUnderCat(){
        try {
            $con = $this->db;
            $sql = "INSERT INTO $this->table( name,cat_id) 
            VALUES (:name, :cat_id)";
            $req = $con->prepare($sql);
            $req->bindValue(':name',$this->name);
            $req->bindValue(':cat_id',$this->cat_id);
            if($req->execute()){
                $this->id = $this->db->lastInsertId();
            }
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of cat_id
     */ 
    public function getCat_id()
    {
        return $this->cat_id;
    }

    /**
     * Set the value of cat_id
     *
     * @return  self
     */ 
    public function setCat_id($Cat_id)
    {
        $this->cat_id = $Cat_id;

        return $this;
    }
}