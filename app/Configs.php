<?

   class Configs{
   
       public function __construct(){
           $this->Check_Config_Exist();
           
       }
       
       public function Check_Config_Exist(){
           if(file_exist('config.ini')){
              $this->Check_Config_Data();   
           }else{
                 $this->Error_Msg = "Warning: File config.ini is not exist! Please rename default_config.ini on config.ini!";
              if(file_exist('default_config.ini')){
                 $this->Check_Config_Data(); 
              }else{
                 $this->Error_Msg = "Error: File config.ini and default_config.ini are not exist!" 
              }
           }
       }
       
       public function Check_Config_Data(){
          if($this->Error_Msg[0]="W"){
            echo "$this->Error_Msg";
            $this->Bool = True;
          else if($this->Error_Msg[0]="E"){
            echo "$this->Error_Msg";
            $this->Bool = False;
          }
       }
   }

?>
