<?php
ob_end_clean();

$catindex = $route[3];
$categories = "REGEXP " . '"' . $catindex . "," . '"';

//connecting DB
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";
$conn = new mysqli($servername, $username, $password, $dbname);


$catitems = $conn->query("select name, mediumpic, price, actionprice, description, categorylist from goods where categorylist REGEXP '$catindex,' " );
require_once('php_modules/head.php');

echo "<body>";
echo "<div class = 'container'>";
breadcrumbs();


while($catshow = $catitems->fetch_array(MYSQLI_ASSOC)) {

echo "<div class = 'col-md-4'" . " style = 'width:32%;height:250px; background:rgba(0,0,128,0.1); border-style:solid; border-width:2px; border-color:grey; margin:5px' " . ">";

echo "<div class = 'row' id = " . $catshow["name"] ." >";
echo "<img src = " . '"' . $catshow["mediumpic"] . '"' . " style = 'width:110px; height:110px; margin-left: 10px '".">";

echo "<ul style = 'float:right; text-align: right; list-style:none; font-size:16px; padding-right:10px;'>";
echo "<li>" . "<h2 style = 'margin-top:0px;'> " . $catshow["name"] . "</h2>" ."</li>";
echo "<li>" . "Цена: " . $catshow["price"] . "</li>";
echo "<li>" . "Акционная цена: " . $catshow["actionprice"] . "</li>";
echo "</ul>";

echo "</div>";

echo "<div class = 'row'>";
echo "<div style = 'margin-top:10px; margin-left:10px; width:93%; height: 70px; overflow:hidden;'>" . $catshow["description"] . "</div>";
echo "</div>";

echo "<label onclick='hi(" . $catshow["name"] . ");' style = 'padding: 5px 15px; margin: 10px 30%; background:rgba(30,50,150,0.5); color:white; border-radius:6px'>Подробнее</label>";

echo "</div>";
}
echo "</div>";

echo "
<script>
function hi(iteamname){
window.location.href = '/Goods_catalog/index.php/p/' + $.trim($(iteamname).find('h2').text());
}
</script>
";

echo "</body>";
echo "</html>";


?>
