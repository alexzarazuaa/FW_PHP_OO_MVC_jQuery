<?php

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
