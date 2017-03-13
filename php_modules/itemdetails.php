<?php

$itemname = $route[3];

//connecting DB
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";
$conn = new mysqli($servername, $username, $password, $dbname);

//reading DB
$result = $conn->query("SELECT name,description,price,actionprice, mediumpic,largepic,categorylist FROM goods WHERE name = '$itemname'");

while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
$name = $rs["name"];
$price = $rs["price"];
$actionprice = $rs["actionprice"];
$description = $rs["description"];
$categorylist = $rs["categorylist"];
$mediumpic = $rs["mediumpic"];
$largepic = $rs["largepic"];
$categorylist = $rs["categorylist"];
}


  $catlistArray = explode(',', $categorylist);
   $catlist = array();
    foreach ($catlistArray as $value) {
        if (!empty($value)) {
            $catlist[] = trim($value);
        }
    }


$catresult = $conn->query("SELECT ID, catname FROM categories");
//output DB data
echo "<ul style='list-style:none; font-size:18px; text-align:left; padding-left:0px;'>";

$catsarray = [];
$catstoshow = [];

while($rs2 = $catresult->fetch_array(MYSQLI_ASSOC)) {
$catsarray[$rs2["ID"]] = $rs2["catname"];
}

for ($i = 0; $i < count($catlist); $i++){
$catstoshow[] = $catsarray[$catlist[$i]];
}

$catsresult  = implode(",", $catstoshow);

if ($catsresult == ""){
$catsresult = "default";
}

require_once('php_modules/head.php');
echo "<body>";

echo "
<div class = 'container'>";
breadcrumbs();
echo "
<div class = 'row'>
<div class = 'col-md-3'>
<img src ='$mediumpic' class = 'mediumpic'>

<label class = 'editbutton' onclick = 'he();'>Заменить изображение</label>
<form name = 'changemediumpic' action ='../../php_modules/functions/changemediumpic.php' method='post' class = 'changemediumpic'>
<label> Введите путь к новому изображению </label>
<br>
<input name='newmediumpic' type='text'>
<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>


<input type = 'submit' value = 'Заменить изображение'>
</form>
</div>

<div class = 'col-md-9 itemdetails'>
<h2>$name</h2>
<h5>(Категории: $catsresult ) </h5>


<label class = 'buybutton'>купить</label>

<ul class = 'prices'>
<li>Цена: $price грн</li>
<li>Цена по акции: $actionprice грн</li>
<li><label class = 'editbutton' onclick = 'showitempriceedit();'>Изменить цены</label></li>
<li>
<form name = 'changeitemprice' action ='../../php_modules/functions/changeitemprice.php' method='post' class = 'changeitemprice'>
<label> Введите новые значения цен </label>
<br>
<input name='newitemprice' type='text'><br>
<input name='newactionitemprice' type='text'><br>
<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>
<input type = 'submit' value = 'Изменить цены'>
</form>
</li>
</ul>

</div>


</div><!-- /row -->
<div class = 'row'>
<div class = 'col-md-12'>
<h2>Описание товара: </h2>
<div class = 'itemdescription'>$description</div>
<label class = 'editbutton' onclick = 'showdescriptionedit();'>Изменить описание товара</label><br>
<form name = 'changeitedescription' action ='../../php_modules/functions/changeitedescription.php' method='post' class = 'changeitedescription'><br>
<label> Отредактируйте описание товара </label>
<br>
<!-- 
<input name='newitemdescription' type='text'><br> --><br>
<textarea name = 'newitemdescription'></textarea><br>
<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>
<input type = 'submit' value = 'Сохранить описание товара'>
</form>

<br>

<div class = 'row'>
<div class = 'col-md-6'>
<label class = 'editbutton' style = 'background:green; color:white; display:inline;' onclick = 'addnewitem();'>Добавить товар</label><br>
<form name = 'additem' action ='../../php_modules/functions/additem.php' method='post' ENCTYPE='multipart/form-data' class = 'additem' style='display:none;'><br>

<br>

<label>Название товара</label><br>
<input name = 'additemname'><br>

<label>Описание товара</label><br>
<textarea name = 'itemdescription'></textarea><br>

<label>Цена</label><br>
<input name = 'itemprice'><br>

<label>Акционная цена</label><br>
<input name = 'actionitemprice'><br>

<label>Изображение товара</label><br>
Select the file to upload: <input type='file' name='userfile'>


<label>Категория товара</label><br>
";

$catresult = $conn->query("SELECT ID, catname FROM categories");
while($rs2 = $catresult->fetch_array(MYSQLI_ASSOC)) {

echo "<div style= 'display:inline-block; padding:10px 15px; margin-left:15px; border-style:solid; border-width:1px; border-color:red;'><input class = '". $rs2["catname"] ."' type='checkbox' name='". $rs2["ID"] ."' value='". $rs2["catname"] . "'";
for($i = 0; $i < count($catstoshow); $i++){
if($catstoshow[$i] == $rs2["catname"]){
echo " checked ";
}
}
echo ">" . $rs2["catname"] . "</div>" ;
}
echo "<br>";


echo "
<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>
<input name='itemcategory' class = 'zenk' type='text' >
<br>
<input type = 'submit' value = 'Добавить товар'>
</form>
</div>

<div class = 'col-md-6'>
<label class = 'editbutton' style = 'background:red; color:white; display: block; float:right' onclick = 'delcurrentitem();'>Удалить товар
</label>
<br>

<form name = 'delitem' action ='../../php_modules/functions/delitem.php' method='post' class = 'delitem' style='display:none; width:100%'><br>

<input name='backadress' value =" . $_SERVER['REQUEST_URI'] . " type='text' hidden>
<input name='itemname' value =" . $itemname . " type='text' hidden>
<br>
<input type = 'submit' value = 'Удалить этот товар' style = 'display:block; float:right'>
</form>

</div>
</div>
<br>
</div>
</div>
</div>
";

echo "
<script>

function he(){
$('.changemediumpic').toggle();
}

function showitempriceedit(){
$('.changeitemprice').toggle();
}

function showdescriptionedit(){
$('.changeitedescription').toggle();
}

function addnewitem(){
$('.additem').toggle();
}

function delcurrentitem(){
$('.delitem').toggle();
}
";

echo '
catlist = [];
$(' . "'" .'input[type="checkbox"]' . "'" . ').change(function() {

if($(this).prop(' . "'" . 'checked' . "'" . ') == true){
catlist.push($(this).attr(' . "'" . 'name' . "'" . '));
$(' . "'" . '.zenk' . "'" . ').attr(' . "'" . 'value' . "'" . ', catlist + ",");
}

if($(this).prop( ' . "'" . 'checked' . "'" . ') == false){
delelem = $.inArray($(this).attr(' . "'" . 'name' . "'" . '), catlist );
catlist.splice(delelem, 1); 
$(' . "'" . '.zenk' . "'" . ').attr(' . "'" . 'value' . "'" . ', catlist);
}
});

</script>
</body>
</html>
';


?>
