<?php

//breadcrumbs();

function breadcrumbs(){
// getting URL and splitting it to parts
   $routeArray = explode('/', $_SERVER['REQUEST_URI']);
   $route = array();
    foreach ($routeArray as $value) {
        if (!empty($value)) {
            $route[] = trim($value);
        }
    }

// rendering microformat breadcrumbs depending on actual url
echo '<div xmlns:v="http://rdf.data-vocabulary.org/#">';
echo "<span>";
for ($i = 0; $i < count($route); $i++) {
echo "<span>";
$z = $z.'/'.$route[$i] ;
echo '<a href="' . $z . '" rel="v:url" property="v:title">' . $route[$i] . '</a> › </span>';
}
echo '</div>';
}

?>
