<?php 
   
 class Dbconnect 
 { 
  private $_localhost = 'localhost'; 
  private $_user = 'root'; 
  private $_password = '12345'; 
  private $_dbname = 'covid'; 
   
  protected $connection; 
   
   public function __construct() 
   { 
   
   if(!isset($this-> connection)) 
   { 
               
               $this->connection = new mysqli($this->_localhost , $this->_user , $this->_password , $this->_dbname); 
   
   } 
   
   return $this->connection; 
   
   } 
 } 
   
 ?>