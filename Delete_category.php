<?php
include_once './connect.php';

$conn = new Connect();
$dblink = $conn->connectToPDO();

if(isset($_GET['cid'])):
    $value = $_GET['cid'];
    $sqlSelect = "DELETE FROM `category` WHERE CatID = ?";
    $stmt = $dblink->prepare($sqlSelect);
    $execute = $stmt->execute(array("$value"));
    if($execute){
        header("Location: Category_management.php");
    }
    else{
        echo "Failed".$execute;
    }
endif;
?>