<?php
$host = "localhost"; //địa chỉ mysql server sẽ kết nối đến
$dbname="mydb"; //tên database sẽ kết nối đến
$username = "root"; //username để kết nối đến database 
$password = ""; // mật khẩu để kết nối đến database

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