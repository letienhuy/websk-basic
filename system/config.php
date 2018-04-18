<?php
    $config = array();
    $config['servername'] = "localhost";
    $config['database'] = "sukien";
    $config['username'] = "root";
    $config['password'] = "";
    function base_url(){
        $dir = __DIR__;
        $dir = str_replace('\\', '/', $dir);
        $dir = pathinfo($dir);
        $dir = str_replace($_SERVER['DOCUMENT_ROOT'], '', $dir['dirname']);
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';
        return $protocol.'://'.$_SERVER['HTTP_HOST'].$dir;
    }
    function paginate($index, $total, $limit, $param = null){
        $page = ceil($total/$limit);
        echo '<div class="paginate">';
        for($i = 1; $i <= $page; $i++){
           if($index == $i){
            echo'<span class="active">'.$i.'</span>';
           } else {
            echo'<a href="?'.$param.'&page='.$i.'">'.$i.'</a>';
           }
        }
        echo '</div>';
    }
?>