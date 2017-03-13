<?php
$newitemdescription = $_POST['newitemdescription'];

$itemname = $_POST['itemname'];
$backadress = $_POST['backadress'];

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "UPDATE goods
SET description =('$newitemdescription')
WHERE name=('$itemname');  ";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Новое описание товара успешно сохранено.";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

header("Refresh:3; url=$backadress");
?>




