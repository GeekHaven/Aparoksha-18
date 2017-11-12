<?php
require_once 'database_handler.php';
    $sql = 'SELECT item_id FROM item';
		$temp = DatabaseHandler::GetAll($sql);
                print_r($temp);
    function add_login_admin_logger($rollnum){
        global $dbh2;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $query = "INSERT INTO loginlogger (admrollnum,ip_address) VALUES ('{$rollnum}','{$ip}')";
        $result = mysql_query($query,$dbh2);
        if($result){
            return 1;
        }
        else {
            return 0;
        }
    }

    function admin_action_logger($rollnum,$action,$matter,$matterid){
        global $dbh2;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $query = "INSERT INTO actionlogger (by_rollnum,matter,matter_id,action,ip_address) VALUES
        ('{$rollnum}','{$matter}','{$matterid}','{$action}','{$ip}')";
        $result = mysql_query($query,$dbh2);
        if($result){
            return 1;
        }
        else {
            return 0;
        }
    }
?>