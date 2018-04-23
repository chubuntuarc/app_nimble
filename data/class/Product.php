<?php
require_once 'data/conection.php';

class Product {
   private $id_product;
   private $name;
   private $description;
   private $picture;
   private $id_category;
   private $real_price;
   private $sale_price;
   const Table = 'products';
  
  //Getters
   public function getId() {
      return $this->id_product;
   }
   public function getName() {
      return $this->name;
   }
   public function getDescription() {
      return $this->description;
   }
   public function getPicture() {
      return $this->picture;
   }
   public function getCategory() {
      return $this->id_categori;
   }
   public function getRealPrice() {
      return $this->real_price;
   }
   public function getSalePrice() {
      return $this->sale_price;
   }
  //Setters
   public function setName($name) {
      $this->name = $name;
   }
   public function setDescription($description) {
      $this->description = $description;
   }
   public function setPicture($picture) {
      $this->picture = $picture;
   }
   public function setCategory($id_category) {
      $this->id_category = $id_category;
   }
   public function setRealPrice($real_price) {
      $this->real_price = $real_price;
   } 
   public function setSalePrice($sale_price) {
      $this->sale_price = $sale_price;
   }
  //Construct
  public function __construct($name, $description=null, $picture=null, $id_category, $real_price, $sale_price, $id_product=null) {
      $this->name = $name;
      $this->description = $description;
      $this->picture = $picture;
      $this->id_category = $id_category;
      $this->real_price = $real_price;
      $this->sale_price = $sale_price;
      $this->id_product = $id_product;
   }
  //Functions
   public function save(){
      $connect = new Connect();
      if($this->id_product) /*Update*/ {
         $query = $connect->prepare('UPDATE ' . self::Table .' SET name = :name, description = :description, picture = :picture, id_category = :id_category, real_price = :real_price, sale_price = :sale_price WHERE id_product = :id_product');
         $query->bindParam(':name', $this->name);
         $query->bindParam(':description', $this->description);
         $query->bindParam(':picture', $this->picture);
         $query->bindParam(':id_category', $this->id_category);
         $query->bindParam(':real_price', $this->real_price);
         $query->bindParam(':sale_price', $this->sale_price);
         $query->bindParam(':id_product', $this->id_product);
         $query->execute();
      }else /*Insert*/ {
         $query = $connect->prepare('INSERT INTO ' . self::Table .' (name, description, picture, id_category, real_price, sale_price) VALUES(:name, :description, :picture, :id_category, :real_price, :sale_price)');
         $query->bindParam(':name', $this->name);
         $query->bindParam(':description', $this->description);
         $query->bindParam(':picture', $this->picture);
         $query->bindParam(':id_category', $this->id_category);
         $query->bindParam(':real_price', $this->real_price);
         $query->bindParam(':sale_price', $this->sale_price);
         $query->execute();
         $this->id_product = $connect->lastInsertId();
      }
      $connect = null;
   }
  //Set product stock
   public static function setStock($quantity, $quantity_min, $operation){
       $last_id = Product::getLastId();
       $connect = new Connect();
     if($operation == 'new'){
       $query = $connect->prepare('INSERT INTO stock (id_product, quantity, quantity_min) VALUES (:id_product, :quantity, :quantity_min)');
     }
       $query->bindParam(':quantity', $quantity);
       $query->bindParam(':quantity_min', $quantity_min);
       $query->bindParam(':id_product', $last_id);
       $query->execute();
    }
  //Search product by ID
   public static function searchById($id_product){
       $connect = new Connect();
       $query = $connect->prepare('SELECT name, description, picture, id_category, real_price, sale_price FROM ' . self::Table . ' WHERE id_product = :id_product');
       $query->bindParam(':id_product', $id_product);
       $query->execute();
       $response = $query->fetch();
       if($response){
          return new self($response['name'], $response['description'], $response['picture'], $response['id_category'], $response['real_price'], $response['sale_price'], $id_product);
       }else{
          return false;
       }
    }
  //Search all product values
   public static function getAll(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT p.id_product, name, description, picture, id_category, real_price, sale_price, s.quantity as stock, s.quantity_min as min_stock FROM ' . self::Table . ' p LEFT JOIN stock s ON s.id_product = p.id_product ORDER BY name');
       $query->execute();
       $response = $query->fetchAll();
       return $response;
    }
  
 //Delete product by ID
   public static function deleteById($id_product){
       $connect = new Connect();
       $query = $connect->prepare('DELETE FROM ' . self::Table . ' WHERE id_product = :id_product');
       $query->bindParam(':id_product', $id_product);
       $query->execute();
    }
  //Get last insert id
   public static function getLastId(){
       $connect = new Connect();
       $query = $connect->prepare('SELECT id_product FROM products ORDER BY id_product DESC LIMIT 1');
       $query->execute();
       $response = $query->fetch();
       return $response['id_product'];
    }
  
}
?>