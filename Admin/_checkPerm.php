<?php
    require '../sql/dbconnect.php';
    if($_GET){
        $table = $_GET['table']; //get table name from query string
        $query = $DBcon->query("SELECT * FROM $table");
        $row=$query->fetch_array();
        if ($row['mode'] == 0) {
            $msg = 0;
        }
        else $msg = 1;
        echo $msg;
    }  
?>