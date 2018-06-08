<?php
  class redirect{
      public function redirect_succesfull_login(){
         header(location:"https://".$_SERVER['SERVER_NAME']."/profile.php");
      }
      public function redirect_unsuccesfull_login($error){
         header(location:"https://".$_SERVER['SERVER_NAME']."/login.php/?error=".$error.");
      }
  }



?>
