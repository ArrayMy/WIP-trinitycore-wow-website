<?php
require_once('Configs.php');
   class connect{
     
     public static $connect;
     
      public function connect(){
       $Config = new Configs();
       $Config->Load_Data();
       self::connect = mysqli_connect($Config->self::config[Connect][Database_Host],$Config->self::config[Connect][Database_User],$Config->self::config[Connect][Database_User_Password]);
      }
     
   }
  
   


?>
