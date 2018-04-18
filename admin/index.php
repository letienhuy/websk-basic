<?php
    require_once('../system/header.php');
    if(!$user){
        header('Location: login.php');
    }
?>
<div id="content">
    <div class="container">
    </div>
</div>
<?php
    require_once('../system/footer.php');
?>