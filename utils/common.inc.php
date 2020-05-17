<?php
 function loadModel($model_path, $model_name, $function, $arrArgument = '',$arrArgument2 = ''){
    $model = $model_path . $model_name . '.class.singleton.php';
    
    if (file_exists($model)) {
        include_once($model);
        $modelClass = $model_name;
        // print_r($function);
        // print_r($modelClass);

        if (!method_exists($modelClass, $function)){
            throw new Exception();
        }

        $obj = $modelClass::getInstance();

        if ($arrArgument == ''){
            return call_user_func(array($obj, $function));
           //print_r("esta asi");
        }else{
            if ($arrArgument2 == ''){
                echo $arrArgument2;
                //print_r("esta asi");
                return call_user_func(array($obj, $function),$arrArgument);
            }else{
                //print_r("esta asi con dos arg");
                //print_r("esta asi e");
                return call_user_func(array($obj, $function),$arrArgument,$arrArgument2);
                
            }
        }    
        
    } else {
        throw new Exception();
        //print_r("estas asi");
    }
}


    function loadView($rutaVista = '', $templateName = '') {//function render views
        $view_path = $rutaVista . $templateName;
        //$arrData = '';
        // echo $view_path;
        if (file_exists($view_path)) {
            include_once($view_path);
        } else {
           require_once VIEW_PATH_INC . "error404.php";
            //die();
        }
    }



    function generate_token_JWT($iduser){
        $header = '{"typ":"JWT", "alg":"HS256"}';
        $secret = generate_Token_secure(20);
    
        $arrayPayload =array(
            'iat' => time(),
            'exp'=> time() + (15 * 60),
            'name'=> $iduser
           );
           $payload = json_encode($arrayPayload);
    
        $JWT = new JWT;
        return $JWT->encode($header, $payload, $secret);
      
    }


    function decode_token($token){
        $secret = generate_Token_secure(20);
        $JWT = new JWT;
        $json = $JWT->decode($token, $secret);
        return $json;
    }
