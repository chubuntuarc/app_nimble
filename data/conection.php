<?php 
//Clase para la conexión a base de datos
 class Connect extends PDO { 
   private $database = 'mysql';
   private $host = 'localhost';
   private $database_name = 'nimble';
   private $user = 'root';
   private $password = ''; 
   public function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->database.':host='.$this->host.';dbname='.$this->database_name, $this->user, $this->password);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 
?>