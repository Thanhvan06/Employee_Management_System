<?php
require('connectdb.php');
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
    <title>iYell社員管理システム</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="text-center">iYell社員管理システム</h2>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th><?php echo $result['id']; ?></th>
            </tr>
            <tr>
                <th>社員番号</th>
                <th><?php echo $result['num']; ?></th>
            </tr>
            <tr>
                <th>氏名</th>
                <th><?php echo $result['name']; ?></th>
            </tr>
            <tr>
                <th>部署</th>
                <th><?php echo $result['department']; ?></th>
            </tr>
            <tr>
                <th>性別</th>
                <th><?php echo $result['gender']; ?></th>
            </tr>
        </table>

        <a href="index.php">戻る</a>
    </div>
    <?php } ?>
</body>

</html>