<?php
    require '../../sql/dbconnect.php';
    if($_GET){
        $minutes = $_GET['minutes']; //get table name from query string
        $seconds = $_GET['seconds']; //get table name from query string
        $query = "UPDATE `controls` SET `minutes` = '$minutes', `seconds` = '$seconds' WHERE `controls`.`id` = 1";
        if ($DBcon->query($query) == true) {
            $msg = "Succes: Time Allowed $minutes:$seconds";
        }
        else{
            $msg = "server error. Contact Admin";
        }
        echo $msg;
    }  
?>