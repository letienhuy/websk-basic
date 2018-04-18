<?php
    require_once('../system/header.php');
    if($user){
        header('Location: index.php');
    }
    $error = null;
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username)){
            $error = "Chưa nhập tài khoản!";
        }elseif(empty($password)){
            $error = "Chưa nhập mật khẩu!";
        }else{
            $usr = db_whereRaw('admin', "username='$username' and password='$password'");
            if(count($usr) == 0){
                $error = "Tài khoản hoặc mật khẩu sai!";
            } else {
                if(setcookie('userid', $usr[0]['id'], time()+3600, '/')){
                    header('Location: index.php');
                } else {
                    $error = "Có lỗi xảy ra, vui lòng thử lại sau!";
                }
            }
        }
    }
?>
<div id="content">
    <div class="container">
        <div class="dialog">
            <?php if($error) echo '<div class="alert alert-danger">'.$error.'</div>';?>
            <form method="post">
                <div class="form-group">
                    <label for="email">Tài khoản:</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>