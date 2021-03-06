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
    <div class="col-md-3 col-sm-4">
        <div class="list">
            <h1 class="title">Chức năng</h1>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="sukien.php">QUẢN LÝ SỰ KIỆN</a>
                </li>
                <li class="list-group-item">
                    <a href="hoadon.php">QUẢN LÝ HOÁ ĐƠN</a>
                </li>
                <li class="list-group-item">
                    <a href="diadiem.php">QUẢN LÝ ĐỊA ĐIỂM</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9 col-sm-8">
        <div class="list">
            <h1 class="title">
                DANH SÁCH SỰ KIỆN
            </h1>
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
                <a href="edit-sk.php?id=<?php echo $item['id'] ?>">Sửa</a> | <a href="edit-sk.php?id=<?php echo $item['id'] ?>&action=delete">Xoá</a>
                </td>
            </tr>
            <?php } ?>
            </table>
        <?php echo paginate($_GET['page'], $total, $limit); ?>
        </div>
    </div>
    </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>