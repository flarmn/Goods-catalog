<?php
   $routeArray = explode('/', $_SERVER['REQUEST_URI']);
   $route = array();
    foreach ($routeArray as $value) {
        if (!empty($value)) {
            $route[] = trim($value);
        }
    }

require_once('functions/breadcrumbs.php');

if( $route[0] == "Goods_catalog" && $route[1] == ""){
ob_clean();
home($route);
}


if( $route[1] == "index.php" && $route[2] != "p" && $route[2] != "c" ){
ob_clean();
home($route);
}

 if( $route[2] == "c"){
ob_end_clean();
showCatInfo($route);
}

 if( $route[2] == "p" && $route[2] != "c"){
ob_end_clean();
showItemInfo($route);
}


// ****************************** [HOME] **********************

function home($route){
require_once('php_modules/home.php');
}


// ****************************** [CATALOG INFO] **********************
function showCatInfo($route){
require_once('php_modules/cataloginfo.php');
}



// ****************************** [ITEM DETAILS] **********************
function showItemInfo($route){
require_once('php_modules/itemdetails.php');
}

?>
