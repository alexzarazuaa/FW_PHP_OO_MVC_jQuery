<?php
define('PROJECT', '/SPORT_V1.6/');

//SITE_ROOT
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);

//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);

//CSS
define('CSS_PATH', SITE_PATH . 'view/css/');



//JS
define('JS_PATH', SITE_PATH . 'view/js/');



//IMG
define('IMG_PATH', SITE_PATH . 'view/img/');

//IMAGES 
define('IMGAGES_PATH', SITE_PATH . 'view/images/');

//PRODUCTION
define('PRODUCTION', true);

//MODEL
define('MODEL_PATH', SITE_ROOT . 'model/');

//MODULES
define('MODULES_PATH', SITE_ROOT . 'modules/');

//VIEW_INC
define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');

//VIEW_LANG
define('VIEW_PATH_LANG', SITE_ROOT . 'view/Lang/');

//RESOURCES
define('RESOURCES', SITE_ROOT . 'resources/');

//ROUTER
define('ROUTER', SITE_ROOT . 'router/');

//MEDIA
define('MEDIA_PATH', SITE_ROOT . '/media/');

//UTILS
define('UTILS', SITE_ROOT . 'utils/');




//MODEL_CONTACT
define('UTILS_CONTACT', SITE_ROOT . 'modules/contact/utils/');
define('MODEL_PATH_CONTACT', SITE_ROOT . 'modules/contact/model/');
define('JS_VIEW_CONTACT', SITE_PATH . 'modules/contact/view/js/');



//amigables
define('URL_AMIGABLES', FALSE);
