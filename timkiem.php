<?php
    require_once('system/header.php');
    if(empty($_GET['page']) || $_GET['page'] < 1){
        $_GET['page'] = 1;
    }
    if(isset($_GET['key'])){
        connect();
        $key = mysqli_real_escape_string($cnn,$_GET['key']);
        disconnect();
        $limit = 10;
        $total = count(db_whereRaw('sukien', "name like '%$key%'"));
        $start = ($_GET['page'] - 1) * $limit;
        $sukien = db_whereRaw('sukien', "name like '%$key%' limit $start,$limit");
    }
?>
<div id="content">
    <div class="container">
        <div class="list">
            <h1 class="title">KẾT QUẢ TÌM KIẾM</h1>
            <?php if(empty($_GET['key'])){ ?>
                <div class="list">
                <div class="alert alert-danger">Bạn chưa nhập từ khoá!</div>
                </div>
            <?php } else{ ?>
                <h3 class="title" style="font-size: 14px">
                Tìm thấy <?php echo $total; ?> kết quả với từ khoá "<b><?php echo $_GET['key']; ?></b>"
                </h3>
            <div class="row">
            <?php foreach($sukien as $item){ ?>
                <div class="col-sm-6">
                    <div class="item">
                        <img class="thumb" src="<?php echo $item['poster']; ?>"/>
                        <div class="info">
                            <h3>
                                <a href="<?php echo base_url().'/chitiet.php?id='.$item['id']; ?>"><?php echo $item['name'];?></a>
                            </h3>
                            <div class="info-date">
                                <div class="col-xs-6">
                                    <span><i class="fa fa-calendar-check-o" style="color: #ff3c00;"></i> <?php echo date('d/m/Y', strtotime($item['date_start'])); ?></span>
                                    <?php $dd = db_where('diadiem', ['id', $item['id_diadiem']])[0]; ?>
                                    <span><i class="fa fa-map-marker" style="color: blue;"></i> <?php echo $dd['name']; ?></span>
                                </div>
                                <div class="col-xs-6" style="text-align: right;">
                                    <span>
                                        <?php echo date('H:iA', strtotime($item['time_start'])); ?> - <?php echo date('H:iA', strtotime($item['time_stop'])); ?>
                                    </span>
                                    <span>
                                        <?php if($item['price']) echo "<b>".$item['price']." đ</b>"; else echo "<b>Miễn phí</b>" ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <?php echo paginate($_GET['page'], $total, $limit); ?>
        <?php } ?>
    </div>
</div>
<?php
    require_once('system/footer.php');
?>