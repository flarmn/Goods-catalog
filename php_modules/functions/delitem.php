

<?php
$itemname = $_POST['itemname'];
$backadress = $_POST['backadress'];

$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "goodscat";


try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "DELETE FROM goods
WHERE name = ('$itemname'); ";
    $conn->exec($sql);
    echo "Товар успешно удален.";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

header("Refresh:3; url=$backadress");
?>







