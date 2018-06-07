<?php
require_once('Log.php');
require_once('Connect.php');
require_once('Configs');

  class database{
    
      public function connect(){
      $this->connect = new connect();
      $this->connect->connect(); 
      }
      
      public function load_data_from_config(){
      $config = new Configs();
      $config->Load_Data();
      $config::$config[Databases][Database_World];
      if(){
        
      }
      
      }
  }


?>
