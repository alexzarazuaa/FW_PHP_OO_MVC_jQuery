<?php

class login_model {
    
    private $bll;
    static $_instance;
    

    private function __construct() {
        $this->bll = login_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function insert_user_model($data){
         
        return $this->bll->insert_register_user($data);
        //return $data;
      
    }

    public function exist_user_model($user_email,$nickname){
         
        return $this->bll->exist_user_bll($user_email,$nickname);
        //return $data;
      
    }
    public function exist_id_model($data){

         
        return $this->bll->check_id_bll($data);
        //return $data;
      
    }

    public function mail_recover_model($data){
                
        return $this->bll->mail_recover_bll($data);
    }

    public function update_password_model($data){
        return $this->bll->update_password_bll($data);
    }

    public function check_usermail_model($data){
        return $this->bll->mail_check_bll($data);
    }

    
    public function exist_type_user_model(){
        return $this->bll->exist_type_user_bll();
    }


  


   
}