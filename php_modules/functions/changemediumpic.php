<?php
$newmediumpic = $_POST['newmediumpic'];

$itemname = $_POST['itemname'];
$backadress = $_POST['backadress'];


$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "UPDATE goods
SET mediumpic =('$newmediumpic')
WHERE name=('$itemname');  ";
    $conn->exec($sql);
    echo "Новое изображение назначено товару успешно.";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
echo $testname;
header("Refresh:3; url=$backadress");
?>




