<?php
class home_model {
    private $bll;
    static $_instance;

    private function __construct() {
        //print_r("entra construc model home");
        require_once 'home_bbl.class.singleton.php';
        $this->bll = home_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
           // print_r("entra crea construct");
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function obtain_data_BLL($arrArgument){
        return $this->bll->obtain_data_list_BLL($arrArgument);
    }
    public function obtain_data_details($arrArgument){
        return $this->bll->obtain_data_details_BLL($arrArgument);
    }
    public function best_breed_home($arrArgument){
        return $this->bll->best_breed_home_BLL($arrArgument);
    }
    public function load_name(){
        return $this->bll->load_name_BLL();
    }
    public function select_auto_name($arrArgument){
        return $this->bll->select_auto_name_BLL($arrArgument);
    }
    public function active_user($arrArgument){
        return $this->bll->active_user_BLL($arrArgument);
    }
}