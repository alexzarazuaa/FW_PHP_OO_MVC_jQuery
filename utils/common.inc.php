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



    // function generate_token_JWT($id){
    //     $header = '{"typ":"JWT", "alg":"HS256"}';
    //     $secret = 'maytheforcebewithyou';
    
    //     /////////////////////////// yomogan ////////////////////////////////////////
    //     //iat: Tiempo que inició el token
    //     //exp: Tiempo que expirará el token (+1 hora)
    //     //name: info user
    //     $payload = '{
    //         "iat":time(), 
    //         "exp":time() + (60*60),
    //         "name":"yomogan"
    //     }';
    
    //     $JWT = new JWT;
    //     $token = $JWT->encode($header, $payload, $secret);
      
    // }


    // function decode_token($token){
    //     $json = $JWT->decode($token, $secret);
    //     echo 'JWT encode yomogan: '.$token."\n\n"; echo '<br>';
    //     echo 'JWT decode yomogan: '.$json."\n\n"; echo '<br>'; echo '<br>';
    // }
