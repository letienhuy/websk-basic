<?php
    require_once('../system/database.php');
    if(!$user){
        header('Location: ../index.php');
    }
    if(!isset($_GET['id'])){
        header('Location: sukien.php');
    }
    $sukien = db_where('sukien', ['id', $_GET['id']])[0];
    $diadiem = db_where('diadiem', ['id', '>', 0]);
    if(isset($_GET['action']) && $_GET['action'] == "delete"){
        if(db_delete('sukien', ['id', $_GET['id']])){
            header('Location: sukien.php');
        }
    }
    if(isset($_POST['edit'])){
        if(empty($_POST['name']) || empty($_POST['poster']) || !is_numeric($_POST['price']) || empty($_POST['total_tickets']) ||
        empty($_POST['time_start']) || empty($_POST['time_stop']) || empty($_POST['diadiem']) || empty($_POST['diachi']) || empty($_POST['about']) || empty($_POST['date_start'])){
            http_response_code(422);
            echo json_encode(["error" => "Vui lòng nhập đầy đủ thông tin sự kiện!"]);
            exit();
        }else{
            if(db_update('sukien', ['id', $_GET['id']], [
                'name' => $_POST['name'],
                'poster' => $_POST['poster'],
                'price' => $_POST['price'],
                'total_tickets' => $_POST['total_tickets'],
                'time_start' => $_POST['time_start'],
                'time_stop' => $_POST['time_stop'],
                'id_diadiem' => $_POST['diadiem'],
                'diachi' => $_POST['diachi'],
                'about' => $_POST['about'],
                'date_start' => date('Y/m/d', strtotime($_POST['date_start']))
            ])){
                http_response_code(200);
                echo json_encode(["success" => "Đã lưu lại!"]);
                exit();
            }else{
                http_response_code(422);
                echo json_encode(["error" => "Có lỗi xảy ra, vui lòng thử lại sau!"]);
                exit();
            }
        }
    }
?>
<?php
    require_once('../system/header.php');
?>
<div id="content">
    <div class="container">
        <div class="list">
            <h3 class="title">SỬA SỰ KIỆN</h3>
            <form method="post" id="edit-sk" data-id="<?php echo $sukien['id'] ?>">
            <div id="result"></div>
            <div class="form-group">
                <label for="email">Tên sự kiện:</label>
                <input type="text" class="form-control" name="name" value="<?php echo $sukien['name'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Poster:</label>
                <input type="" class="form-control" name="poster" value="<?php echo $sukien['poster'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Giá vé:</label>
                <input type="" class="form-control" name="price" value="<?php echo $sukien['price'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Số lượng vé:</label>
                <input type="" class="form-control" name="total_tickets" value="<?php echo $sukien['total_tickets'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Giờ bắt đầu:</label>
                <input type="time" class="form-control" name="time_start" value="<?php echo $sukien['time_start'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Giờ kết thúc:</label>
                <input type="time" class="form-control" name="time_stop" value="<?php echo $sukien['time_stop'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Địa điểm:</label>
                <select name="diadiem" class="form-control">
                    <?php foreach($diadiem as $dd){ ?>
                        <option value="<?php echo $dd['id'] ?>" <?php if($dd['id'] == $sukien['id_diadiem']) echo "selected"; ?>><?php echo $dd['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="pwd">Địa chỉ:</label>
                <input type="" class="form-control" name="diachi" value="<?php echo $sukien['diachi'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Ngày diễn ra sự kiện:</label>
                <input type="date" class="form-control" name="date_start" value="<?php echo $sukien['date_start'] ?>">
            </div>
            <div class="form-group">
                <label for="pwd">Giới thiệu (HTML):</label>
                <textarea name="about" id="gioithieu">
                    <?php echo $sukien['about'] ?>
                </textarea>
                <script>CKEDITOR.replace('gioithieu');</script>
            </div>
            <button type="submit" class="bt btn btn-success" name="edit">Lưu thông tin</button>
        </form>
        </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>