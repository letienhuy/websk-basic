<?php
    require_once('config.php');
    $cnn = null;
    function connect(){
        global $cnn;
        global $config;
        $cnn = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['database']);
        mysqli_set_charset($cnn,"utf8");
    }
    function disconnect(){
        global $cnn;
        mysqli_close($cnn);
    }
    /**
     * Where function
     *
     * @param string $table
     * @param array $array
     * @return void
     */
    function db_whereRaw($table, $query){
        global $cnn;
        $query = "select * from $table where $query";
        connect();
        $result = mysqli_query($cnn, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        disconnect();
        return $data;
    }
    function db_where($table, $array){
        global $cnn;
        $query = "select * from $table";
        connect();
        if(sizeof($array) == 3){
            $query .= " where $array[0] $array[1] '$array[2]'";
        } else {
            $query .= " where $array[0] = '$array[1]'";
        }
        $result = mysqli_query($cnn, $query);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        disconnect();
        return $data;
    }
    /**
     * Update function
     *
     * @param string $table
     * @param array $where
     * @param array $array
     * @return void
     */
    function db_update($table, $where, $array){
        global $cnn;
        $query = "update $table set ";
        connect();
        foreach($array as $key => $val){
            $query .= "$key = '$val', ";
        }
        $query = trim($query, ', ');
        if(sizeof($where) == 3){
            $query .= " where $where[0] $where[1] '$where[2]'";
        } else {
            $query .= " where $where[0] = '$where[1]'";
        }
        $result = mysqli_query($cnn, $query);
        disconnect();
        if($result){
            return true;
        }
        return false;
    }
    /**
     * Undocumented function
     *
     * @param [type] $table
     * @param [type] $array
     * @return void
     */
    function db_insert($table, $array){
        global $cnn;
        $query = "insert into $table set ";
        connect();
        foreach($array as $key => $val){
            $query .= "$key = '$val', ";
        }
        $query = trim($query, ', ');
        $result = mysqli_query($cnn, $query);
        disconnect();
        if($result){
            return true;
        }
        return false;
    }
    $user = null;
    if(isset($_COOKIE['userid'])){
        $user = db_where('admin', ['id', $_COOKIE['userid']])[0];
    }
    function db_delete($table, $array){
        global $cnn;
        $query = "delete from $table ";
        connect();
        if(sizeof($array) == 3){
            $query .= " where $array[0] $array[1] '$array[2]'";
        } else {
            $query .= " where $array[0] = '$array[1]'";
        }
        $result = mysqli_query($cnn, $query);
        disconnect();
        if($result){
            return true;
        }
        return false;
    }
    $user = null;
    if(isset($_COOKIE['userid'])){
        $user = db_where('admin', ['id', $_COOKIE['userid']])[0];
    }
?>