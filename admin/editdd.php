<?php
    require_once('../system/database.php');
    if(!$user){
        header('Location: ../index.php');
    }
    if(!isset($_GET['id'])){
        header('Location: diadiem.php');
    }
    $diadiem = db_where('diadiem', ['id', $_GET['id']])[0];
    if(isset($_GET['action']) && $_GET['action'] == "delete"){
        if(db_delete('diadiem', ['id', $_GET['id']])){
            $sukien = db_update('sukien', ['id_diadiem', $_GET['id']], [
                'id_diadiem' => 0
            ]);
            header('Location: diadiem.php');
        }
    }
    if(isset($_POST['edit'])){
        if(empty($_POST['name'])){
            http_response_code(422);
            echo json_encode(["error" => "Vui lòng nhập đầy đủ thông tin sự kiện!"]);
            exit();
        }else{
            if(db_update('diadiem', ['id', $_GET['id']], [
                'name' => $_POST['name']
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
            <h3 class="title">SỬA ĐỊA ĐIỂM</h3>
            <form method="post" id="edit-dd" data-id="<?php echo $diadiem['id'] ?>">
            <div id="result"></div>
            <div class="form-group">
                <label for="email">Tên địa điểm(Tỉnh/ Thành Phố):</label>
                <input type="text" class="form-control" name="name" value="<?php echo $diadiem['name'] ?>">
            </div>
            <button type="submit" class="bt btn btn-success" name="edit">Lưu thông tin</button>
        </form>
        </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>