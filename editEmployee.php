<?php
require('connectdb.php');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $sl = $_POST['sl'];
    $ht = $_POST['ht'];
    $cm = $_POST['cm'];
    $gt = $_POST['gt'];

    $sql = "UPDATE `users` SET `num`=?,`name` = ?, `department`=?, `gender` =? WHERE ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sl, $ht, $cm, $gt, $id]);
    echo "<script>alert('Edit successful');</script>";
    header('location: main.php');
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE id = $id";

    $result = $conn->query($sql)->fetch();

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
                    <input type="" class="form-control" id="社員番号" name="sl" value="<?php echo $result['num'] ?>">
                </div>
                <div class="form-group">
                    <label for="氏名">氏名</label>
                    <input type="" class="form-control" id="氏名" name="ht" value="<?php echo $result['name'] ?>">
                </div>
                <div class=" form-group">
                    <label for="">部署</label>
                    <select class="form-control" id="部署" name="cm">
                        <option value="ceo" <?php if ($result["department"] == "ceo") { ?>selected<?php } ?>>CEO
                        </option>
                        <option value="cto" <?php if ($result["department"] == "cto") { ?>selected<?php } ?>>CTO
                        </option>
                        <option value="hr" <?php if ($result["department"] == "hr") { ?>selected<?php } ?>>HR</option>
                    </select>
                </div>
                <div class=" form-group">
                    <label>性別 : </label>
                    <input type="radio" name="gt" id="男" value="1" <?php if ($result["gender"] == "1") { ?>
                        checked<?php } ?>>
                    <label for="男">男</label>
                    <input type="radio" name="gt" id="女" value="0" <?php if ($result["gender"] == "0") { ?>
                        checked<?php } ?>>
                    <label for="女">女</label>
                </div>
                <div class="btn">
                    <a href="index.php">戻る</a>
                    <input type="hidden" value="<?php echo $result['id'] ?>" name="id"> <input type="submit"
                        class="btn btn-primary" name="submit" value="編集">
                </div>

            </form>
        </div>
        <?php  } ?>
</body>

</html>