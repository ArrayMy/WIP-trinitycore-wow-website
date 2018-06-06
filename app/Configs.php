<?
require_once('Log.php');
   class Configs{
   
      public static $config;
      
       public function __construct(){
           $this->Check_Config_Exist();
           
       }
       
      public function Check_Config_Exist(){
           if(file_exist("_DIR_ . \"/../../configs/config.ini")){
              $this->Check_Config_Data();   
           }else{
                 $this->Error_Msg = "Warning: File config.ini is not exist! Please rename default_config.ini on config.ini!";
              if(file_exist("_DIR_ . \"/../../configs/config.ini")){
                 $this->Check_Config_Data(); 
              }else{
                 $this->Error_Msg = "Error: File config.ini and default_config.ini are not exist!";
              }
           }
       }
       
       public function Check_Config_Data(){
          if($this->Error_Msg[0]="W"){
            $log = new log($this->Error_Msg);
            $log->in_to_log();   
            $this->Bool = True;
          else if($this->Error_Msg[0]="E"){
            $log = new log($this->Error_Msg);
            $log->in_to_log();
            $this->Bool = False;
            die();
          }else{
            $this->Bool = True;
          }
       }
          
       public function Load_Data(){
          $this->Check_Config_Exist;
          if($this->Bool==True){
             self::config = parse_ini_file("_DIR_ . \"/../../configs/config.ini",true);
          }else if($this->Bool==False){
             die();
          }else{
          }
       }
   }

?>
