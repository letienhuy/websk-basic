<?php
  ob_start();
  require_once('database.php');
  $user = null;
  if(isset($_COOKIE['userid'])){
    $user = db_where('admin', ['id', $_COOKIE['userid']])[0];
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/app.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/swiper.min.css">
    <script src="<?php echo base_url(); ?>/ckeditor/ckeditor.js"></script>
    <title>Timsukien - Mạng chia sẻ sự kiện</title>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
              aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-logo" href="<?php echo base_url(); ?>">
              <img src="<?php echo base_url(); ?>/public/logo.png" alt="Logo TimSuKien" w>
            </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="#">Trang chủ
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li>
                <a href="#">Link</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">Action</a>
                  </li>
                  <li>
                    <a href="#">Another action</a>
                  </li>
                  <li>
                    <a href="#">Something else here</a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="#">Separated link</a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="#">One more separated link</a>
                  </li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left" action="timkiem.php">
              <div class="input-group">
                <input type="text" name="key" class="form-control" placeholder="Tìm kiếm sự kiện...">
                <span class="input-group-btn">
                  <button class="btn btn-default">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
              <ul class="nav navbar-nav navbar-right">
                  <?php if($user){ ?>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Xin chào: <?php echo $user['username']; ?>
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="<?php echo base_url(); ?>/admin">Admin Cpanel</a>
                      </li>
                      <li>
                        <a href="<?php echo base_url(); ?>/admin/tao.php">Tạo sự kiện</a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li>
                        <a href="<?php echo base_url(); ?>/admin/logout.php">Thoát</a>
                      </li>
                    </ul>
                  </li>
                <?php } ?>
              </ul>
            </div>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>