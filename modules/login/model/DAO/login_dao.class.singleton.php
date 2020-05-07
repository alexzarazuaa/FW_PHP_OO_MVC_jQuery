<?php
// print_r ("entra dai ");
// die();
class login_dao
{
    static $_instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }


    public function insert_user($db, $data){ //insert a register manual user
        $email   = $data['email'];
        $nickname = $data['nickname'];
        $password  =  password_hash($data['password'], PASSWORD_BCRYPT);
        $has_avatar = $data['email'];
        $avatar = "https://api.adorable.io/avatars/80/$has_avatar";
        $token = generate_Token_secure(20);
        $sql = "INSERT INTO user (userid,user_email,nickname,password,avatar,token) 
            VALUES('$nickname','$email','$nickname','$password',' $avatar','$token')";
        return $db->ejecutar($sql);

        // return $data;

    }//end_insert

    function exist_user($db,$user_email,$nickname){

        $sql = "SELECT * FROM user WHERE nickname='$nickname' AND user_email='$user_email'  ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    function select_id ($db){
        
        $sql = "SELECT userid FROM user ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function user_email($db)
    {
        $sql = "SELECT user_email FROM user WHERE userid=nickname";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }


    public function active_user($db,$data) {
        // return "dentro select";
        $token_update = generate_Token_secure(20);
        $sql="UPDATE user SET active=1,token='$token_update' where token='$data'";
        return $db->ejecutar($sql);
    }
}
