<?php
require_once('Configs.php');
require_once('Log.php');
   class connect{
     
     public static $connect;
     
      public function connect(){
       $Config = new Configs();
       $Config->Load_Data();
       self::connect = new mysqli($Config::config[Connect][Database_Host],$Config::config[Connect][Database_User],$Config::config[Connect][Database_User_Password]);
       if(mysqli->connect_errno){
          $error = "Error: There was no connection to the database!"
          $check_error = new log($error);
          $check_error->check_error();
       }else{
       }
      }
     
   }
  
   


?>
