<?php
    require_once('../system/header.php');
    if(!$user){
        header('Location: login.php');
    }
    if(empty($_GET['page']) || $_GET['page'] < 1){
        $_GET['page'] = 1;
    }
    $limit = 10;
    $total = count(db_where('sukien', ['date_start', '>', date('Y-m-d')]));
    $start = ($_GET['page'] - 1) * $limit;
    $sukien = db_whereRaw('sukien', "date_start > ".date('Y-m-d')." limit $start,$limit");
?>
<div id="content">
    <div class="container">
    <div class="row">
        <div class="list">
            <h1 class="title">
                Quản lý sự kiện
            </h1>
            <a href="taosk.php">
                <button class="btn btn-success">Tạo sự kiện</button>
            </a>
            <table class="table">
            <tr>
                <th>ID</th>
                <th>Tên sự kiện</th>
                <th>Giá vé</th>
                <th>Số vé còn</th>
                <th>Action</th>
            </tr>
            <?php foreach($sukien as $item){ ?>
            <tr>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['price'] ?></td>
                <td><?php echo $item['total_tickets'] ?></td>
                <td>
                <a href="editsk.php?id=<?php echo $item['id'] ?>">Sửa</a> | <a href="editsk.php?id=<?php echo $item['id'] ?>&action=delete">Xoá</a>
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