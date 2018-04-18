<?php
    require_once('system/header.php');
    if(isset($_GET['id'])){
        connect();
        $id = mysqli_real_escape_string($cnn,$_GET['id']);
        disconnect();
        $sukien = db_where('sukien', ['id', $id])[0];
        $diadiem = db_where('diadiem', ['id', $sukien["id_diadiem"]])[0];
        if(!$sukien){
            header('Location: index.php');
        }
    } else{
        header('Location: index.php');
    }
?>
<div id="content">
    <div class="container-fluid">
        <div class="poster">
            <img src="<?php echo $sukien['poster']; ?>" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <div class="info-sk">
                    <div class="calendar hidden-xs">
                        <div class="month">
                            <span>Tháng <?php echo date('m', strtotime($sukien['date_start'])); ?></span>
                        </div>
                        <div class="date">
                            <span><?php echo date('d', strtotime($sukien['date_start'])); ?></span>
                        </div>
                    </div>
                    <div class="info-sk_info">
                        <h3><?php echo $sukien['name']; ?></h3>
                        <span><i class="fa fa-calendar-check-o" style="color: #ff3c00;"></i> <b><?php echo date('d/m/Y', strtotime($sukien['date_start'])); ?></b></span>
                        <span><i class="fa fa-clock-o" style="color: #ff3c00;"></i> <?php echo date('H:iA', strtotime($sukien['time_start'])); ?> - <?php echo date('H:iA', strtotime($sukien['time_stop'])); ?></span>
                        <span><i class="fa fa-map-marker" style="color: #ff3c00;"></i> <b><?php echo $diadiem['name']; ?></b></span>
                        <span><?php echo $sukien['diachi']; ?></span>
                    </div>
                </div>
                <div class="dieu-huong hidden-xs">
                    <span><a href="#gioi-thieu">GIỚI THIỆU</a></span>
                    <span><a href="#binh-luan">BÌNH LUẬN</a></span>
                </div>
                <div id="gioi-thieu">
                    <h3 class="visible-xs">Giới thiệu</h3>
                    <?php echo $sukien['about']; ?>
                </div>
                <div id="binh-luan">
                    <h3>Bình luận</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="ticket">
                    <h3>Thông tin vé</h3>
                    <i>(Với vé có phí bạn chỉ được chọn tối đa 10 vé, với vé miễn phí bạn chỉ được chọn tối đa 1 vé)</i>
                    <div class="alert alert-success">
                        Số vé còn: <?php echo $sukien['total_tickets']; ?>
                    </div>
                    <table>
                        <tr>
                            <th>Số lượng</th>
                            <th>Giá vé</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="buy-ticket">
                                    <input type="text" name="num_ticket" value="1">
                                </div>
                            </td>
                            <th><?php if($sukien['price']) echo $sukien['price']." đ"; else echo "<Miễn phí" ?></th>
                        </tr>
                        <tr>
                            <th colspan="2" id="total-price" data-price="<?php echo $sukien['price']; ?>">Tổng tiền: 0đ</th>
                        </tr>
                    </table>
                    <?php if($sukien['total_tickets'] == 0){ ?>
                        <div class="alert alert-danger">
                            Số lượng vé bán online đã hết
                        </div>
                    <?php }else{ ?>
                        <center>
                            <button class="bt btn btn-primary" data-toggle="modal" data-target="#modal-dat-ve">ĐẶT VÉ NGAY</button>
                        </center>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-dat-ve" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ĐẶT VÉ SỰ KIỆN - <?php echo $sukien['name']; ?></h4>
        </div>
        <div class="modal-body">
        <form method="post" id="dat-ve">
            <div id="result"></div>
            <input type="hidden" name="id" value="<?php echo $sukien['id']; ?>">
            <input type="hidden" name="ticket" value="<?php echo $sukien['id']; ?>">
            <div class="form-group">
                <label for="email">Địa chỉ email:</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="email">Họ tên:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="pwd">Số điện thoại:</label>
                <input type="" class="form-control" name="phone">
            </div>
            <div class="form-group">
                <label for="pwd">Địa chỉ:</label>
                <input type="" class="form-control" name="diachi">
            </div>
            <button type="submit" class="bt btn btn-success" name="datve">XÁC NHẬN ĐẶT VÉ</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>
<?php
    require_once('system/footer.php');
?>