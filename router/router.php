<?php
require_once("paths.php");
//require 'autoload.php';

include(UTILS . "utils.inc.php");
include(UTILS . "common.inc.php");
//include(UTILS . "upload.inc.php");
include(UTILS . "mail.inc.php");

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
    //print($_POST['module']);
    if (!empty($_GET['module'])) {

        if (!empty($_POST['module'])) {
            $module_uri = $_POST['module'];
            //print_r("entra en if !isset");
        } else {
            $module_uri = $_GET['module'];
           // print_r("entra en ELSE");
        }

        // print_r($module_uri);
    } else {
        $module_uri = 'contact';
        /////PREGUNTAR
        echo '<script>window.location.href = "./contact/";</script>';
        /////PREGUNTAR
    }

    if (!empty($_POST['function'])) {
        $function_uri = $_POST['function'];
          //print_r($function_uri);
    } else {
        $function_uri = $module_uri;
        //print_r("entra aqui");
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
{
    //print_r($function_uri);

    $functions = simplexml_load_file(MODULES_PATH . $module . "/resources/functions.xml");
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
        call_user_func(array($obj, $event));
    }
}

handlerRouter();
