<?php
    class log(){
        public function __construct($ErrorMsg){
             $this->ErrorMsg = $ErrorMsg;
        }
        
        
        
        public function in_to_log(){
             if(file_exist("_DIR_ . \"/../../logs/log.txt")){
                $this->open_file();
                fwrite($this->file,$this->ErrorMsg."\n");
                fclose();
             }else{
                $this->open_file();
                fwrite($this->file,$this->ErrorMsg."\n");
                fclose();
             }
        }
        
        public function check_error(){
         if($this->ErrorMsg[1]=="E"){
             $this->in_to_log();
             $this->Bool=false;
             die();
         }else if($this->ErrorMsg[1]=="W"){
         $this->in_to_log();
         $this->Bool=true;
         }else{
         $this->Bool=true;   
         }
        }
    
        public function open_file(){
             $this->file = fopen('../../logs/log.txt','w');
        }
        
    
    }


?>
