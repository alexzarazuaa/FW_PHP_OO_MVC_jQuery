<?php
    function amigable($url, $return = false) {//pretty php
        //print_r("estoy entrando");
        $amigableson = URL_AMIGABLES;
        $link = "";
        if ($amigableson) {
            $url = explode("&", str_replace("?", "", $url));
            foreach ($url as $key => $value) {
                $aux = explode("=", $value);
                $link .=  $aux[1]."/";
            }
        } else {
            $link = "index.php?" . $url;
        }
        if ($return) {
            return SITE_PATH . $link;
        }
        echo SITE_PATH . $link;
    }
