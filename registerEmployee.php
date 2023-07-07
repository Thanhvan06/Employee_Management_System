<?php
require('connectdb.php');

if(isset($_POST['submit'])){
    $sl = $_POST['sl'];
    $ht = $_POST['ht'];
    $cm = $_POST['cm'];
    $gt = $_POST['gt'];
    
    $sql = "INSERT INTO `users` (`num`,`name`, `department`, `gender`) VALUES ($sl, '$ht', '$cm',$gt)";
    $result = executedb($sql);
    if($result>0){
        echo "<script>alert('Add successful');</script>";
        header('location: main.php');
    }else{
        echo "<script>alert('Add failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>社員管理システム</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="col-6 m-auto border border-secondary">
            <form method="post">
                <h4 class="bg-secondary text-white p-2 my-0 mx-n3">社員管理システム</h4>
                <div class="form-group">
                    <label for="社員番号">社員番号</label>
                    <input type="" class="form-control" id="社員番号" name="sl">
                </div>
                <div class="form-group">
                    <label for="氏名">氏名</label>
                    <input type="" class="form-control" id="氏名" name="ht">
                </div>
                <div class="form-group">
                    <label for="">部署</label>
                    <select class="form-control" id="部署" name="cm">
                        <option value="helo">学生</option>
                        <option value="hello">先生</option>
                        <option value="hllo">エンジニア</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>性別 : </label>
                    <input type="radio" name="gt" id="男" value="1"> <label for="男">男</label>
                    <input type="radio" name="gt" id="女" value="0"> <label for="女">女</label>
                </div>
                <input type="submit" class="btn btn-primary mt-3" name="submit" value="登録">
            </form>
        </div>
</body>

</html>