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
           /*not complete*/
         }
          $this->Bool = true;
        }
      }
     public function decrypt_sha_pass_hash($user_array){
       $this->SHA_PASS_HASH = sha1(strtoupper($user_array['username']).':'.strtoupper($user_array['password']));
     }
     public function login_use_hash(){
      if(isset($_POST['username'])){
       $user_array = $_POST['username'];
       if(isset($_POST['password'])){
         $user_array = $_POST['password'];
       }else{
        $this->login_error = "Fill all fields!";
        $this->login_unsuccesfull();
       }
      }else{
       $this->login_error = "Fill all fields!";
       $this->login_unsuccesfull();
      }
    
      if(isset($user_array){
        $this->decrypt_sha_pass_hash($user_array); 
        if($this->connect::$connect->query("SELECT * FROM account WHERE username=$user_array['username']") === true){
          $this->user_db_array = $this->connect::$connect->query("SELECT * FROM account WHERE username=$user_array['username']");
          if($user_array['username'] == $this->user_db_array['username']){
           if($this->SHA_PASS_HASH == $this->user_db_array['sha_pass_hash']){
             $this->login_succesfull();
           }else{
             $this->login_error = "Wrong username or password!";
             $this->login_unsuccesfull();
           }
          }else{
            $this->login_error = "Wrong username or password!";
            $this->login_unsuccesfull();
          }
        }else{
          $this->login_error = "Wrong username or password!";
          $this->login_unsuccesfull();
        }
       }
     }
         
     
  }


?>
