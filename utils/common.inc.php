<?php

function loadView($rutaVista = '', $templateName = '', $arrPassValue = '') {
        $view_path = $rutaVista . $templateName;
        $arrData = '';

        if (file_exists($view_path)) {
            if (isset($arrPassValue))
                $arrData = $arrPassValue;
            include_once($view_path);
        } else {
            /*$result = response_code($rutaVista);
            $arrData = $result;
            require_once VIEW_PATH_INC_ERROR . "error.php";*/
            //die();
        }
    }
