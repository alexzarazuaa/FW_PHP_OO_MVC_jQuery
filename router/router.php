<?php

 require 'autoload.php';

// include(UTILS . "utils.inc.php");
// include(UTILS . "common.inc.php");
// //include(UTILS . "upload.inc.php");
// include(UTILS . "mail.inc.php");

if (PRODUCTION) { //estamos en producción
    ini_set('display_errors', '1');
    ini_set('error_reporting', E_ERROR | E_WARNING); //error_reporting(E_ALL) ;
} else {
    ini_set('display_errors', '0');
    ini_set('error_reporting', '0'); //error_reporting(0); 
}

ob_start();
session_start();
$_SESSION['module'] = "";

function handlerRouter()
{
    //print_r("entra");

    if (!empty($_GET['module'])) { 
        // enter when we are in a module or $ get is not empty
        if (!empty($_POST['module'])) {
            $module_uri = $_POST['module']; //if comes from any js
            //print_r("entra en if !isset");
        } else {
            $module_uri = $_GET['module'];  // if comes from main_menu
            // print_r("entra en ELSE");
        }

        // print_r($module_uri);
    } else {
        $module_uri = 'home';
        echo '<script>window.location.href = "./home";</script>';
    }

    if (!empty($_POST['function'])) {   //if comes from any js
        $function_uri = $_POST['function']; //it passes the value it takes per post to the function
        //print_r($function_uri);
    } else {
        if (!empty($_GET['function'])) {//entra aqui si la function no existe
            $function_uri = $_GET['function'];  
            //print_r("entra aqui");
        } else { // pass the name of the module as a function
            $function_uri =  $module_uri;
        }
    }
    handlerModule($module_uri, $function_uri);
}

function handlerModule($module_uri, $function_uri)
{
    $modules = simplexml_load_file('resources/modules.xml');
    $exist = false;

    foreach ($modules->module as $module) {
        if (($module_uri === (string) $module->uri)) {

            $exist = true;
            // print_r($module_uri);

            $path = MODULES_PATH . $module_uri . "/controller/controller_" . $module_uri . ".class.php";
            //print_r($path);

            if (file_exists($path)) {
                //print_r($path);
                require_once($path);
                $controllerClass = "controller_" . $module_uri;
                $obj = new $controllerClass;
            } else {
                //die($module_uri . ' - Controlador no encontrado');

                require_once(VIEW_PATH_INC . "menu.html");
                require_once(VIEW_PATH_INC . "error404.php");
                require_once(VIEW_PATH_INC . "top_page.php");
                require_once(VIEW_PATH_INC . "footer.html");
            }
            handlerfunction(((string) $module->name), $obj, $function_uri);
            break;
        }
    }
    if (!$exist) {
        require_once(VIEW_PATH_INC . "menu.html");
        require_once(VIEW_PATH_INC . "error404.php");
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "footer.html");
    }
}

function handlerfunction($module, $obj, $function_uri)
{ //pass the name of the function and check that it is in the name of the xml

    //print_r($function_uri);

    $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/functions.xml");  //check if function exists
    $exist = false;

    foreach ($functions->function as $function) {

        if (($function_uri === (string) $function->name)) {
            $exist = true;
            $event = $function_uri;
            //print_r($event);
            break;
        }
    }

    if (!$exist) {
        require_once(VIEW_PATH_INC . "menu.html");
        require_once(VIEW_PATH_INC . "error404.php");
        require_once(VIEW_PATH_INC . "top_page.php");
        require_once(VIEW_PATH_INC . "footer.html");
    } else {
        call_user_func(array($obj, $event)); //call to the function in envent and obj is the module
    }
}

handlerRouter();
