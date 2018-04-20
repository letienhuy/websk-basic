<?php
    require_once('../system/database.php');
    if(!$user){
        header('Location: ../index.php');
    }
    if(isset($_POST['tao'])){
        if(empty($_POST['name'])){
            http_response_code(422);
            echo json_encode(["error" => "Vui lòng nhập đầy đủ thông tin sự kiện!"]);
            exit();
        }else{
            if(db_insert('diadiem', [
                'name' => $_POST['name']
            ])){
                http_response_code(200);
                echo json_encode(["success" => "Thêm địa điểm mới thành công!"]);
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
            <h3 class="title">THÊM ĐỊA ĐIỂM MỚI</h3>
            <form method="post" id="tao-dd">
            <div id="result"></div>
            <div class="form-group">
                <label for="email">Tên địa điểm(Tỉnh/ Thành Phố):</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button type="submit" class="bt btn btn-success" name="tao">THÊM ĐỊA ĐIỂM</button>
        </form>
        </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>