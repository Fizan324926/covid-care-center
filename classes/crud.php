<?php 
   
 include_once ('connect.php'); 
   
 class Crud extends Dbconnect 
 { 
             
             public     $columns=""; 
             public $values=""; 
             
             public $column=""; 
             public $value=""; 
             
             
             
             public function __construct() 
             { 
             parent::__construct();        
             } 
             
             
              public function selectalldata($table) 
   { 
                 $select="SELECT * FROM $table"; 
     $select1=$this->connection->query($select); 
     return $select1; 
   } 
             
             public function selectbyid($table,$selectBy,$selectTo) 
             { 
                         $sel= "SELECT * FROM $table where $selectBy=$selectTo"; 
                         $sel1=$this->connection->query($sel); 
                         return mysqli_fetch_array($sel1); 
                         
             } 
             
             public function insert($data,$table) 
             { 
                         
             //print_r($data); 
                         
                         foreach($data as $this->column => $this->value) 
                         { 
                                     
                                     $this->columns .= ($this->columns == "") ? "" : ", "; 
                                     $this->columns .= $this->column; 
                         
                                     $this->values .= ($this->values == "") ? "" : ", "; 
                                     $this->values .= "'".$this->value ."'"; 
                                     
                                     //echo $this->values; 
                         
                         } 
                         
                         $insert= ("INSERT into $table ($this->columns) values ($this->values)"); 
                         //echo $insert; 
                         $insert1= $this->connection->query($insert); 
                         
             } 
             
              public function update($data,$table,$id) 
     { 
              foreach ($data as $this->column => $this->value) 
      { 
      $update=("UPDATE $table SET $this->column = '$this->value' WHERE id= '$id'"); 
             // echo $update; 
              $this->connection->query($update); 
      } 
              return true; 
     } 
             
             function deletedata($table,$where) 
     { 
      $delete=("DELETE FROM $table WHERE id=$where"); 
              $this->connection->query($delete); 
              return true; 
     } 
             
             public function escape_string($value) 
             { 
                         return $this->connection->real_escape_string($value); 
             } 
             
 } 
   
   
 ?>