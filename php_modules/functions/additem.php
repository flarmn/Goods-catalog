<?php

$name = $_POST['additemname'];
$description = $_POST['itemdescription'];
$price = $_POST['itemprice'];
$actionprice = $_POST['actionitemprice'];
$previewpic = $_POST['itemimage'];
$mediumpic = $_POST['itemimage'];
$largepic = $_POST['itemimage'];
$categorylist = $_POST['itemcategory'];

$uploaddir = '../../uploads/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$picadress = "/Goods_catalog/img/" . basename($_FILES['userfile']['name']);

$itemname = $_POST['itemname'];

$backadress = "/Goods_catalog/index.php/p/" . $name;


$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";



 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
   echo "Изображение загружено.\n";

 } else {
   echo "Не удалось загрузить изображение.\n";
 }


if (!copy($uploadfile, '../../img/' . $_FILES['userfile']['name'])) {
    echo "не удалось скопировать $uploadfile...\n";
}


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO goods (name, description, price, actionprice, previewpic, mediumpic, largepic, categorylist)
    VALUES ('$name', '$description', '$price', '$actionprice', '$picadress', '$picadress', '$picadress', '$categorylist')";
    $conn->exec($sql);
    echo "Новый товар успешно сохранен";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
echo $userfile;
echo $mediumpic;
echo "ghghh";
echo $picadress;
echo "<img src = " . "'" . $picadress . "'" . ">";
header("Refresh:5; url=$backadress");
?>
