<?php 

namespace App\Models;


require_once __DIR__ . '/../Database/Database.php';

use PDOException;
use PDO;

class Users{
    
    private $id;
    private $name;
    private $surname;
    private $email;
    private $password;
    private $phone;
    private $adress;
    private $postal_code;
    private $city;
    private $role;


    protected $db;


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

    protected $table = 'clients'; 

    public function getAll(){
        $con = $this->db;
        $request = 'SELECT * FROM '.$this->table ;
        $rows = $con->query($request);
        return $rows->fetchAll();
    }
    public function create(){
        try {
            $con = $this->db;
            $sql = "INSERT INTO $this->table( email, name, password, surname, phone, adress, city, postal_code) 
            VALUES (:email, :name, :password, :surname, :phone, :adress, :city, :postal_code)";
            $req = $con->prepare($sql);
            $req->bindValue(':email',$this->email);
            $req->bindValue(':name',$this->name);
            $req->bindValue(':password',$this->password);
            $req->bindValue(':phone',$this->phone);
            $req->bindValue(':surname',$this->surname);
            $req->bindValue(':adress',$this->adress);
            $req->bindValue(':city',$this->city);
            $req->bindValue(':postal_code',$this->postal_code);
            $req->execute();
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    }
    public function Update(){
        try {
            $con = $this->db;
            $sql = "UPDATE $this->table 
                    SET email=:email,name=:name, surname=:surname, phone=:phone, adress=:adress, city=:city, postal_code=:postal_code
                    WHERE id = :id";
            $req = $con->prepare($sql);
            $req->bindValue(':email',$this->email);
            $req->bindValue(':id',$this->id);
            $req->bindValue(':name',$this->name);
            $req->bindValue(':phone',$this->phone);
            $req->bindValue(':surname',$this->surname);
            $req->bindValue(':adress',$this->adress);
            $req->bindValue(':city',$this->city);
            $req->bindValue(':postal_code',$this->postal_code);
            $req->execute();
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    
    }
    public function UpdateAdmin(){
        try {
            $con = $this->db;
            $sql = "UPDATE $this->table 
                    SET email=:email,name=:name, surname=:surname, phone=:phone, adress=:adress, city=:city, postal_code=:postal_code, role=:role
                    WHERE id = :id";
            $req = $con->prepare($sql);
            $req->bindValue(':email',$this->email);
            $req->bindValue(':id',$this->id);
            $req->bindValue(':name',$this->name);
            $req->bindValue(':phone',$this->phone);
            $req->bindValue(':surname',$this->surname);
            $req->bindValue(':adress',$this->adress);
            $req->bindValue(':city',$this->city);
            $req->bindValue(':role',$this->role);
            $req->bindValue(':postal_code',$this->postal_code);
            $req->execute();
        }
        catch(PDOException $e){
            echo $sql . '<br>' . $e->getMessage();
        }
    
    }
    public function getUserByEmail(){
        $con = $this->db;
        $request = "SELECT * FROM $this->table where email = ? ";
        $stmt = $con->prepare($request);
        $stmt->execute([$this->email]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
        
    }
    public function getById(){
        $con = $this->db;
        $request = "SELECT * FROM $this->table where id = ? ";
        $stmt = $con->prepare($request);
        $stmt->execute([$this->id]);
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
        
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
    
    function passwordUpdate($pass, $id){
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $con = $this->db;
        $sql = "UPDATE `users` 
                SET password=:password
                WHERE id = :id";
       $req = $con->prepare($sql);
       $req->bindValue(':email',$this->email);
       $req->bindValue(':email',$this->email);
       $req->execute();
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
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password =  password_hash($password, PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of postal_code
     */ 
    public function getPostal_code()
    {
        return $this->postal_code;
    }

    /**
     * Set the value of postal_code
     *
     * @return  self
     */ 
    public function setPostal_code($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * Get the value of adress
     */ 
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }
}