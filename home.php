<?php

 include 'session.php';

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
        <title></title>
        <link rel="stylesheet" type="text/css" href="Admin/assets/css/style.css">
        <style>
            .login-btn-small-fade:focus{
                border: none
            }
        </style>
        
    </head>
    <body>
        <div>
        <span style="width:10px; height:10px; border-radius:10px; background:green; float:left; margin-top:5px"></span><b>Contestant <?php echo $conRow[2]."<br> Name: ".$conRow[1] ?></b><span></span>
        </div>
        <div style="float:right">
        <a href="logout.php">LogOut</a>
        </div>
        <div style='text-align:center'>
            <button class='login-btn-small-fade' style='width:300px;; height:40px' name="Check" onclick="checkPerm()">
            START ROUND 2
            </button>
        </div>
        <script src="Admin/assets/js/ui.js"></script>
        <script src="Admin/assets/js/ajaxCall.js"></script>
    </body>
</html>
