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
        <h2>iYell 社員管理システム</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>社員番号</th>
                    <th>氏名</th>
                    <th>部署</th>
                    <th>性別</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
    require 'connectdb.php';
    $list_sql = 'SELECT * FROM users order by id';
    foreach($conn->query($list_sql) as $r){
        ?>
                <tr>
                    <td><?php echo $r['id'];?></td>
                    <td><?php echo $r['num'];?></td>
                    <td><?php echo $r['name'];?></td>
                    <td><?php echo $r['department'];?></td>
                    <td><?php echo $r['gender'];?></td>
                    <td>
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