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


    public function insert_user($db, $data)
    { //insert a register manual user
        $email   = $data['email'];
        $nickname = $data['nickname'];
        $password  =  password_hash($data['password'], PASSWORD_BCRYPT);
        $has_avatar = $data['email'];
        $avatar = "https://api.adorable.io/avatars/80/$has_avatar";
        $token = generate_Token_secure(20);
        $sql = "INSERT INTO user (userid,user_email,nickname,password,avatar,token) 
            VALUES('$nickname','$email','$nickname','$password',' $avatar','$token')";
        $db->ejecutar($sql);

        return $token;

        // return $data;

    } //end_insert

    public function insert_social_user($db, $data)
    {
        $userid = $data['uid'];
        $user_email = $data['email'];
        $email_username = explode("@", $user_email);
        $nickname = $email_username[0];
        $Updatetoken = generate_Token_secure(20);
        $avatar = $data['photoURL'];
        $sql = "INSERT INTO user (userid,user_email,nickname,avatar,activate,token) 
        VALUES('$userid','$user_email','$nickname',' $avatar','1','$Updatetoken')";
        $db->ejecutar($sql);

        return $Updatetoken;
    }

    public function check_registerSocial($db,$data){
        $uid=$data['uid'];
        $sql="SELECT * FROM user where userid='$uid'";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function exist_user($db, $user_email, $nickname)
    {

        $sql = "SELECT * FROM user WHERE nickname='$nickname' AND user_email='$user_email'  ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function select_id($db)
    {

        $sql = "SELECT userid FROM user  WHERE userid=nickname ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function user_email($db)
    {
        $sql = "SELECT user_email FROM user WHERE userid=nickname";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function updatetoken_mail($db, $data)
    {

        $token = generate_Token_secure(20);
        $sql = "UPDATE user set token='$token' WHERE user_email='$data'";
        $stmt = $db->ejecutar($sql);
        return $token;
    }


    public function update_password($db, $data)
    {
        $password  =  password_hash($data[0], PASSWORD_BCRYPT);
        $sql = "UPDATE user set password='$password' WHERE token='$data[1]'";
        $stmt = $db->ejecutar($sql);
    }


    public function check_user_email($db)
    {
        $sql = "SELECT * FROM user WHERE userid=nickname and activate=1 ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }


    public function type_user($db)
    {
        $sql = "SELECT type FROM user WHERE userid=nickname and activate=1 ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function user_session($db,$nickname,$user_email){
        
        $sql = "SELECT user_email,nickname,avatar FROM user WHERE nickname='$nickname' AND user_email='$user_email'  ";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }
}
