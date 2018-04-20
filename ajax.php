<?php
    if(isset($_POST['datve'])){
        require_once('system/database.php');
        if(empty($_POST['id'] || empty($_POST['ticket']))){
            http_response_code(422);
            echo json_encode(['error' => 'Lỗi tham số']);
            exit();
        }
        $sukien = db_where('sukien', ['id', $_POST['id']])[0];
        if(!$sukien){
            http_response_code(422);
            echo json_encode(['error' => 'Có lỗi, không tìm thấy sự kiện']);
            exit();
        }
        if(empty($_POST['email']) || empty($_POST['name']) || empty($_POST['diachi']) || empty($_POST['phone'])){
            http_response_code(422);
            echo json_encode(['error' => 'Vui lòng nhập đủ thông tin!']);
            exit();
        }
        if($_POST['ticket'] > $sukien['total_tickets']){
            http_response_code(422);
            echo json_encode(['error' => 'Số lượng vé còn lại không đủ để mua!']);
            exit();
        }
        if($sukien['price'] == 0 && $_POST['ticket'] > 1){
            http_response_code(422);
            echo json_encode(['error' => 'Vé miễn phí bạn chỉ có thể mua tối đa 1 vé!']);
            exit();
        }
        if($sukien['price'] > 0 && $_POST['ticket'] > 3){
            http_response_code(422);
            echo json_encode(['error' => 'Vé có phí bạn chỉ có thể mua tối đa 3 vé!']);
            exit();
        }
        $insert = db_insert('hoadon', [
            'id_sukien' => $sukien['id'],
            'name' => $_POST['name'],
            'diachi' => $_POST['diachi'],
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'price' => $sukien['price']*$_POST['ticket'],
            'tickets' => $_POST['ticket']
        ]);
        $update = db_update('sukien', ['id', $sukien['id']], ['total_tickets' => $sukien['total_tickets']-$_POST['ticket']]);
        if($insert && $update){
            http_response_code(200);
            echo json_encode(['success' => 'Đặt vé thành công, chúng tôi sẽ liên hệ để xác nhận và giao hàng theo địa chỉ bạn đã cung cấp. Xin cảm ơn!']);
            exit();
        } else{
            http_response_code(422);
            echo json_encode(['error' => 'Có lỗi xảy ra, vui lòng thử lại sau!']);
            exit();
        }
    }
?>
