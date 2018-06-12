<?php
require_once('Log.php');
require_once('Connect.php');
require_once('Configs.php');
require_once('Redirect.php');

  class database{
    
      public function connect(){
        $this->connect = new connect();
        $this->connect->connect(); 
      }
      
    
      public function select_database_world(){
        $this->connect();
        $config = new Configs();
        $config->Load_Data();
        if($this->connect::$connect->select_db("$config::$config[Databases][Database_World]") === false){
           $ErrorMsg = "Database ".$config::$config[Databases][Database_World]." is not exist! Check config.ini!";
           $this->check_error = new log($ErrorMsg);
           $this->check_error->check_error();
           $this->Bool = false;
        }else{
          $this->Bool = true;
        }
      }
    
      public function select_database_auth(){
        $this->connect();
        $config = new Configs();
        $config->Load_Data();
        if($this->connect::$connect->select_db("$config::$config[Databases][Database_Auth]" === false){
           $ErrorMsg = "Database ".$config::$config[Databases][Database_Auth]." is not exist! Check config.ini!";
           $this->check_error = new log($ErrorMsg);
           $this->check_error->check_error();
           $this->Bool = false;
         }else{
          $this->Bool = true;
        }
      }
    
      public function select_database_characters(){
        $this->connect();
        $config = new Configs();
        $config->Load_Data();
         if($this->connect::$connect->select_db("$config::$config[Databases][Database_Characters]" === false){
          $ErrorMsg = "Database ".$config::$config[Databases][Database_Characters]." is not exist! Check config.ini!";
           $this->check_error = new log($ErrorMsg);
           $this->check_error->check_error();
           $this->Bool = false;
         }else{
          $this->Bool = true;
        }
      }
    
            
      public function load_and_check(){
        $this->select_database_world();
        $this->select_database_auth();
        $this->select_database_characters();
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
        $this->redirect = new redirect();
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
    
   public function login_succesfull(){
    session_start();
    $_SESSION['username'] = $this->user_db_array['username'];
    $this->generate_session_token();
    $this->redirect->redirect_succesfull_login();
   }
   
   public function generate_session_token(){
    $rand = $this->user_db_array['username'];
    $rand += rand(15, 25); 
    $_SESSION['session_token'] = $rand;
   }
         
   public function login_unsuccesfull(){
     $this->redirect->redirect_unsuccesfull_login($error);
   }
   public function Show_num_of_chars(){
     echo $this->characters_num;
   }
   public function Show_Characters(){
    $this->characters_num = 0;
    $this->select_database_characters();
    $this->characters_db_array = $this->connect::$connect->query("SELECT * FROM characters WHERE account=$this->user_db_array['id']");
    if(isset($this->characters_db_array[$this->characters_num]['id'])){
      echo $this->characters_db_array[$this->characters_num]['name'];
      echo $this->characters_db_array[$this->characters_num]['class'];
      echo $this->characters_db_array[$this->characters_num]['level'];
      if($this->characters_db_array[$this->characters_num]['online']=="1"){
      echo "Online";
      }else{
      echo "Offline";
      }
      echo $this->characters_db_array[$this->characters_num]['totalKills'];
      $this->characters_num++;
    }else{
    }
   /*Multi array, more characters*/
   }
  }


?>
