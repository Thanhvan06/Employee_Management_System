<?php
require('connectdb.php');
if(isset($_GET["ID"])){
    $id =  $_GET["ID"];
$sql= "DELETE FROM user WHERE ID=$id";
$conn->exec($sql);
header("location: index.php");
}
?>