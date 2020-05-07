<!-- <?php

$path = $_SERVER['DOCUMENT_ROOT'] . "/SPORT_V1.6/";
include_once($path . "modules/login/model/DAO/login_dao.class.singleton.php");

function check_user_registered(){
    $email   = $_POST['email'];
    $nickname = $_POST['nickname'];

    $check_data = array('email' => $email,'nickname' => $nickname);
     return $_POST['email'];
    $info_data= loadModel(MODEL_LOGIN,'login_model','exist_user_model',$check_data);
    
    if($info_data == null){//si no encuentra el username
        
            // $token_check=generate_Token_secure(20);
            // $token_recover=generate_Token_secure(20);
            // $register_type="local";
            // $data = array('nickname'=>$nickname,'email'=>$email,'last_name'=>$last_name,'email'=>$email,'password'=>$password_encrypt,'token_check'=>$token_check,'token_recover'=>$token_recover,'register_type'=>$register_type);
            // return $return=array('exist'=>false,'data'=>$data);

            // call function insert o 
    }else{// si lo encuentra 
        $error="este usuario ya existe";
        // return $usernameok;
        return $return=array('exist'=>true,'error'=>$error);
    }
}

//FUNC TOKEN_SENDMAIL

    function generate_Token_secure($longitud){
        if ($longitud < 4) {
            $longitud = 4;
        }
        return bin2hex(openssl_random_pseudo_bytes(($longitud - ($longitud % 2)) / 2));
    }

?> -->