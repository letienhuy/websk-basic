<?php
    require_once('../system/header.php');
    if(!$user){
        header('Location: login.php');
    }
    if(empty($_GET['page']) || $_GET['page'] < 1){
        $_GET['page'] = 1;
    }
    $limit = 20;
    $total = count(db_where('diadiem', ['id', '>', 0]));
    $start = ($_GET['page'] - 1) * $limit;
    $sukien = db_whereRaw('diadiem', "id > 0 limit $start,$limit");
?>
<div id="content">
    <div class="container">
    <div class="row">
        <div class="list">
            <h1 class="title">
                Quản lý sự kiện
            </h1>
            <a href="taodd.php">
                <button class="btn btn-success">Thêm địa điểm mới</button>
            </a>
            <table class="table">
            <tr>
                <th>ID</th>
                <th>Tên địa điểm</th>
                <th>Action</th>
            </tr>
            <?php foreach($sukien as $item){ ?>
            <tr>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['name'] ?></td>
                <td>
                <a href="editdd.php?id=<?php echo $item['id'] ?>">Sửa</a> | <a href="editdd.php?id=<?php echo $item['id'] ?>&action=delete">Xoá</a>
                </td>
            </tr>
            <?php } ?>
            </table>
        <?php echo paginate($_GET['page'], $total, $limit); ?>
        </div>
    </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>