<?php
require_once('../system/database.php');
if(isset($_GET['id'])){
    if(db_update('hoadon', ['id', $_GET['id']], [
        'status' => 1
    ])){
        header('Location: hoadon.php');
    }
}
?>