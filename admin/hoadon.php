<?php
    require_once('../system/header.php');
    if(!$user){
        header('Location: login.php');
    }
    if(empty($_GET['page']) || $_GET['page'] < 1){
        $_GET['page'] = 1;
    }
    $limit = 10;
    $total = count(db_where('hoadon', ['id', '>', 0]));
    $start = ($_GET['page'] - 1) * $limit;
    $hoadon = db_whereRaw('hoadon', "id > 0 limit $start,$limit");
?>
<div id="content">
    <div class="container">
    <div class="row">
        <div class="list">
            <h1 class="title">
                Quản lý hoá đơn
            </h1>
            <table class="table">
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Điện thoại</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số vé</th>
                <th>Số tiền</th>
                <th>Tình trạng</th>
            </tr>
            <?php foreach($hoadon as $item){ ?>
            <tr>
                <td><?php echo $item['id'] ?></td>
                <td><?php echo $item['name'] ?></td>
                <td><?php echo $item['phone'] ?></td>
                <td><?php echo $item['diachi'] ?></td>
                <td><?php echo $item['email'] ?></td>
                <td><?php echo $item['tickets'] ?></td>
                <td><?php echo $item['price'] ?></td>
                <td><?php echo $item['status'] ? 'Đã thành công' : 'Đang xử lý' ?></td>
                <td>
                <a href="edithd.php?id=<?php echo $item['id'] ?>"><?php echo $item['status'] ? '' : 'Xác nhận & Giao hàng' ?></a>
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