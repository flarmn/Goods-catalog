<?php
$itemname = $_POST['itemname'];
$backadress = $_POST['backadress'];

$newitemprice = $_POST['newitemprice'];
$newactionitemprice = $_POST['newactionitemprice'];

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "UPDATE goods
SET price =('$newitemprice')
WHERE name=('$itemname'); UPDATE goods
SET actionprice =('$newactionitemprice')
WHERE name=('$itemname'); ";
    $conn->exec($sql);
    echo "Новые цены установлены.";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
header("Refresh:3; url=$backadress");
?>




