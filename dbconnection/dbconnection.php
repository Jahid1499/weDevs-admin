<?php

class Dbconnection{

	protected $db;

public function __construct(){

   try{
    
      $this->db = new PDO("mysql:host=localhost;dbname=weDev", "root", "");

   }catch(PDOExection $e){
   	echo $e->getMessage();

   }

}

}






?>