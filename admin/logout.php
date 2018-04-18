<?php
require_once('../system/config.php');
setcookie('userid', '', time()-1, '/');
header('Location: '.base_url().'/index.php');
?>