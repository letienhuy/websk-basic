<?php
    require_once('../system/header.php');
    if(!$user){
        header('Location: ../index.php');
    }
    $diadiem = db_where('diadiem', ['id', '>', 0]);
    $loi = "";
    if(isset($_POST['tao'])){
        
    }
?>
<div id="content">
    <div class="container">
        <div class="list">
            <h3 class="title">TẠO SỰ KIỆN MỚI</h3>
            <form method="post" id="tao-sk" enctype="media">
            <?php if($loi){ ?>
                <div class="alert alert-danger"><?php echo $loi; ?></div>
            <?php } ?>
            <div class="form-group">
                <label for="email">Tên sự kiện:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label for="pwd">Poster:</label>
                <input type="" class="form-control" name="poster">
            </div>
            <div class="form-group">
                <label for="pwd">Giá vé:</label>
                <input type="" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="pwd">Số lượng vé:</label>
                <input type="" class="form-control" name="total_ticket">
            </div>
            <div class="form-group">
                <label for="pwd">Giờ bắt đầu:</label>
                <input type="time" class="form-control" name="time_start">
            </div>
            <div class="form-group">
                <label for="pwd">Giờ kết thúc:</label>
                <input type="time" class="form-control" name="time_stop">
            </div>
            <div class="form-group">
                <label for="pwd">Địa điểm:</label>
                <select name="diadiem" class="form-control">
                    <?php foreach($diadiem as $dd){ ?>
                    <option value="<?php echo $dd['id'] ?>"><?php echo $dd['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pwd">Địa chỉ:</label>
                <input type="" class="form-control" name="diachi">
            </div>
            <div class="form-group">
                <label for="pwd">Giới thiệu (HTML):</label>
                <textarea name="gioithieu" id="gioithieu"></textarea>
                <script>CKEDITOR.replace('gioithieu');</script>
            </div>
            <button type="submit" class="bt btn btn-success" name="tao">Tạo sự kiện</button>
        </form>
        </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>