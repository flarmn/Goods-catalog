<?php

ob_end_clean();
//connecting DB
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";
$conn = new mysqli($servername, $username, $password, $dbname);

//reading DB
$result = $conn->query("SELECT name,description,price,actionprice, previewpic,mediumpic,largepic,categorylist FROM goods ");

require_once('php_modules/head.php');
echo "<body>";

echo '<div class = "container-fluid">';

echo '<div class = "col-md-2 categories-menu ">';
echo "<h3 style = 'text-align:left'>КАТЕГОРИИ</h3>";
echo "<!--  ***********************************************  -->";

//reading CATEGORY
$catresult = $conn->query("SELECT ID, catname FROM categories");

//output DB data
echo "<ul style='list-style:none; font-size:18px; text-align:left; padding-left:0px;'>";

while($rs2 = $catresult->fetch_array(MYSQLI_ASSOC)) {
echo "<li>" . "<a href = '/Goods_catalog/index.php/c/" . $rs2["ID"] . "'" .  "> " . $rs2["catname"] . "</a>" . "</li>" ;
}

echo "</ul>";
echo "<!--  ***********************************************  -->";

echo "
<label class = 'editbutton' onclick = 'addcategory();'>Редактировать категории</label>
<form name = 'changecategory' action ='../../php_modules/functions/addcategory.php' method='post' class = 'changecategory' style = 'display:none;'>
<label> Введите название новой категории </label>
<br>
<input name='newcategory' type='text'>
<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>
<input type = 'submit' value = 'Добавить категорию'>
</form>
<br>
<label class = 'editbutton' onclick = 'vdelcategory();'>Удалить категории</label>
<form name = 'delcategory' action ='../../php_modules/functions/delcategory.php' method='post' class = 'delcategory' style = 'display:none;'>
<label> Введите название категории для удаления </label>
<br>
<input name='delcategory' type='text'>
<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>
<input type = 'submit' value = 'Удалить категорию'>
</form>
";

echo "</div>";

echo '<div class = "col-md-10 items-list ">';
echo '<div class = "row" >';
breadcrumbs();
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
echo "<div class = 'col-md-4'" . " style = 'width:32%;height:250px; background:rgba(0,0,128,0.1); border-style:solid; border-width:2px; border-color:grey; margin:5px' " . ">";

echo "<div class = 'row' id = " . $rs["name"] ." >";
echo "<img src = " . "'" . $rs["mediumpic"] . "'" . " style = 'width:110px; height:110px; margin-left: 10px '".">";

echo "<ul style = 'float:right; text-align: right; list-style:none; font-size:16px; padding-right:10px;'>";
echo "<li>" . "<h2 style = 'margin-top:0px;'> " . $rs["name"] . "</h2>" ."</li>";
echo "<li>" . "Цена: " . $rs["price"] . "</li>";
echo "<li>" . "Акционная цена: " . $rs["actionprice"] . "</li>";
echo "</ul>";

echo "</div>";

echo "<div class = 'row'>";
echo "<div style = 'margin-top:10px; margin-left:10px; width:93%; height: 70px; overflow:hidden;'>" . $rs["description"] . "</div>";
echo "</div>";

echo "<label onclick='hi(" . $rs["name"] . ");' style = 'padding: 5px 15px; margin: 10px 30%; background:rgba(30,50,150,0.5); color:white; border-radius:6px'>Подробнее</label>";

echo "</div><!-- /row div-->";
}



echo '</div><!-- items-list -->';
echo '</div><!-- items-list -->';

$conn->close();

echo"
</div><!-- /container div -->

<script>
function hi(iteamname){
window.location.href = '/Goods_catalog/index.php/p/' + $.trim($(iteamname).find('h2').text());
}

function vdelcategory(){
$('.delcategory').toggle();
}


function addcategory(){
$('.changecategory').toggle();
}
</script>
</body>
</html>
";
?>
