<?
require_once('Log.php');
   class Configs{
   
      public static $config;
      
       public function __construct(){
           
       }
       
      public function Check_Config_Exist(){
           if(file_exist("_DIR_ . \"/../../configs/config.ini")){
           }else{  
                 $this->Error_Msg = "Warning: File config.ini is not exist! Please rename default_config.ini on config.ini!";
              if(file_exist("_DIR_ . \"/../../configs/default_config.ini")){
                 $this->Check_Config_Data(); 
              }else{
                 $this->Error_Msg = "Error: File config.ini and default_config.ini are not exist!";
              }
           }
       }
    
       public function Load_Data(){
          $this->Check_Config_Exist;
          $check_error = new log($this->Error_Msg);
          $check_error->check_error();
          self::config = parse_ini_file("_DIR_ . \"/../../configs/config.ini",true);
       }
   }

?>
