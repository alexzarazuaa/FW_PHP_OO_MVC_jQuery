<?php
define('PROJECT', '/SPORT_V1.6/');

//SITE_ROOT
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT);

//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . PROJECT);



//PATHS

//CSS
define('CSS_PATH', SITE_PATH . 'view/css/');

//VIEW_PATH_LANG
define('LANG_PATH', SITE_PATH . 'view/Lang/');

//JS
define('JS_PATH', SITE_PATH . 'view/js/');

//JQUERY
define('JQUERY_PATH', SITE_PATH . 'view/jquery/');

//TOASTR
define('TOASTR_PATH', SITE_PATH . 'view/js/toastr/');

//IMG
define('IMG_PATH', SITE_PATH . 'view/img/');

//IMAGES 
define('IMGAGES_PATH', SITE_PATH . 'view/images/');




//PRODUCTION
define('PRODUCTION', true);

//ROOT
//HACER PARA LA CARPETA DE UTILS

//MODEL
define('MODEL_PATH', SITE_ROOT . 'model/');

//MODULES
define('MODULES_PATH', SITE_ROOT . 'modules/');

//VIEW_INC
define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');

//RESOURCES
define('RESOURCES', SITE_ROOT . 'resources/');

//ROUTER
define('ROUTER', SITE_ROOT . 'router/');

//MEDIA
define('MEDIA_PATH', SITE_ROOT . '/media/');

//UTILS
define('UTILS', SITE_ROOT . 'utils/');
//FSSEARCH
define('FSEACRH_PATH', SITE_ROOT . 'view/js/');


//MODEL_CONTACT
define('UTILS_CONTACT', SITE_ROOT . 'modules/contact/utils/');
 define('MODEL_CONTACT', SITE_ROOT . 'modules/contact/model/');
 define('DAO_CONTACT', SITE_ROOT . 'modules/contact/model/DAO/');
define('BLL_CONTACT', SITE_ROOT . 'modules/contact/model/BLL/');
define('JS_VIEW_CONTACT', SITE_PATH . 'modules/contact/view/js/');


//MODEL HOME
define('MODEL_PATH_HOME', SITE_ROOT . 'modules/home/model/');
define('DAO_HOME', SITE_ROOT . 'modules/home/model/DAO/');
define('BLL_HOME', SITE_ROOT . 'modules/home/model/BLL/');
define('MODEL_HOME', SITE_ROOT . 'modules/home/model/model/');
define('JS_VIEW_HOME', SITE_PATH . 'modules/home/view/js/');



//MODEL SHOP
define('MODEL_PATH_SHOP', SITE_ROOT . 'modules/shop/model/');
define('DAO_SHOP', SITE_ROOT . 'modules/shop/model/DAO/');
define('BLL_SHOP', SITE_ROOT . 'modules/shop/model/BLL/');
define('MODEL_SHOP', SITE_ROOT . 'modules/shop/model/model/');
define('JS_VIEW_SHOP', SITE_PATH . 'modules/shop/view/js/');


//MODEL SEARCH
define('MODEL_PATH_SEARCH', SITE_ROOT . 'view/js/search/model/');
define('DAO_SEARCH', SITE_ROOT . 'view/js/search/model/DAO/');
define('BLL_SEARCH', SITE_ROOT . 'view/js/search/model/BLL/');
define('MODEL_SEARCH', SITE_ROOT . 'view/js/search/model/model/');
define('JS_VIEW_SEARCH', SITE_PATH . 'view/js/search/view/js/');



//amigables
define('URL_AMIGABLES', TRUE);
