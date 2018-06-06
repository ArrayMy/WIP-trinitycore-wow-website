<?php
    class log(){
        public function __construct($ErrorMsg){
             $this->ErrorMsg = $ErrorMsg;
        }
        
        
        
        public function in_to_log(){
             if(file_exist("_DIR_ . \"/../../logs/log.txt")){
                $this->open_file();
                fwrite($this->file,$this->ErrorMsg);
                fclose();
             }else{
                $this->open_file();
                fclose();
             }
        }
    
        public function open_file(){
             $this->file = fopen('../../logs/log.txt','w');
        }
        
    
    }


?>
