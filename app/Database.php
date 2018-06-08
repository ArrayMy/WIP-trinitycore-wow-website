<?php
require_once('Log.php');
require_once('Connect.php');
require_once('Configs');

  class database{
    
      public function connect(){
        $this->connect = new connect();
        $this->connect->connect(); 
      }
      
      public function load_and_check(){
        $this->connect();
        $config = new Configs();
        $config->Load_Data();
        
        if($this->connect::$connect->select_db("$config::$config[Databases][Database_World]") === false){
           $ErrorMsg = "Database ".$config::$config[Databases][Database_World]." is not exist! Check config.ini!";
           $this->check_error = new log($ErrorMsg);
           $this->check_error->check_error();
           $this->Bool = false;
          
        }else if($this->connect::$connect->select_db("$config::$config[Databases][Database_Auth]" === false){
           $ErrorMsg = "Database ".$config::$config[Databases][Database_Auth]." is not exist! Check config.ini!";
           $this->check_error = new log($ErrorMsg);
           $this->check_error->check_error();
           $this->Bool = false;
          
        }else if($this->connect::$connect->select_db("$config::$config[Databases][Database_Characters]" === false){
          $ErrorMsg = "Database ".$config::$config[Databases][Database_Characters]." is not exist! Check config.ini!";
           $this->check_error = new log($ErrorMsg);
           $this->check_error->check_error();
           $this->Bool = false;
        }else{
         if($config::$config[Custom Tables]){
         }
          $this->Bool = true;
        }
      }
  }


?>
