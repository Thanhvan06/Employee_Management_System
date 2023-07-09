<?php
$host = "localhost"; 
$dbname="mydb"; 
$username = "root"; 
$password = ""; 
try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    function executedb($sql,$param =[]){
        global $conn;
        $stmt=$conn->prepare($sql);
        $stmt->execute($param);
        if($stmt){
            echo "yeah";
        }else{
            echo "ngoo";
        }
        return $stmt->rowCount();
    }
}catch(Exception $e){
    echo $e->getMessage();
}
?>