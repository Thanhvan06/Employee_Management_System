<?php
require('connectdb.php');
if (isset($_POST['id']) && isset($_POST['削除'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
    header("location: index.php");
    echo "<script>alert('Edit successful');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="text-center">
            iYell 社員管理システム
        </h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>社員番号</th>
                    <th>氏名</th>
                    <th>部署</th>
                    <th>性別</th>
                    <th><a href="registerEmployee.php">Register</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $list_sql = 'SELECT * FROM users order by id';
                foreach ($conn->query($list_sql) as $r) {
                ?>
                <tr>
                    <td><a href="detailsEmployee.php?id=<?php echo $r['id']; ?>"><?php echo $r['id']; ?></a></td>
                    <td><?php echo $r['num']; ?></td>
                    <td><?php echo $r['name']; ?></td>
                    <td><?php echo $r['department']; ?></td>
                    <td><?php echo $r['gender']; ?></td>
                    <td><a href="editEmployee.php?id=<?php echo $r['id']; ?>">編集</a>/
                        <form method="post">
                            <input type="submit" value="削除" name="削除" onclick="return confirm('Do want to delete?')">
                            <input type="hidden" name="id" value="<?php echo $r['id'] ?>">
                        </form>

                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</body>

</html>