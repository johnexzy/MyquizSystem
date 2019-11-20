<?php
include 'session.php';
echo $conRow[1]; //array indexed by number
require 'sql/config.php';
$sql  = "TRUNCATE TABLE `john1`";
$empty = $DBcon->prepare($sql);
if ($empty->execute()) {
    $query = "SELECT * FROM `questionround2` \n" . " ORDER BY `id` DESC";
    $stmt = $DBcon->prepare( $query );
    $disp = "<form method='POST' action='logic/logic.inc.php'>";
    if($stmt->execute()){
        $nums=1;
        while($row=$stmt->fetch(PDO::FETCH_BOTH)){
            $disp .= "
                        <div class='container-mains'>
                            <input type='hidden' id='question_id' value='$row[0]'>
                            <p>Question <b>$nums</b></p>
                            <hr>
                            <p>Question: $row[2]</p>
                            <hr>
                            <p>A: <input type='radio' name='$conRow[1]$row[0]' value='$row[3]'>$row[3]</p>
                            <p>B: <input type='radio' name='$conRow[1]$row[0]' value='$row[4]'>$row[4]</p>
                            <p>C: <input type='radio' name='$conRow[1]$row[0]' value='$row[5]'>$row[5]</p>
                            <p>D: <input type='radio' name='$conRow[1]$row[0]' value='$row[6]'>$row[6]</p>
                            
                        </div>
                    ";
            $nums += 1;
        }
        $disp .= "
                    <div style=''>
                        <button id='submit' type='submit' name='submitAnswer' >SUBMIT</button>
                    </div>
                  ";
        $getTime = $DBcon->prepare("SELECT * FROM `controls` WHERE `controls`.`id` = 1");
        $getTime->execute();
        $time = $getTime->fetch(PDO::FETCH_BOTH);
        
        $disp .= "  <input type='hidden' id='minutes' value='$time[1]'><input type='hidden' id='seconds' value='$time[2]'>
                    </form>";
    }
}


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Round 2</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Admin/assets/css/profile.css">
        <link rel="stylesheet" href="Admin/assets/bootstrap/css/bootstrap.css">
        <style>
        .body{
            padding: 10px
        }
        .fixedtop{
            cursor: pointer;
            float: right;	
            width: 100%; 
            position: fixed;
            top: 0;
            background: #fff;
            z-index: 1000;
            height: 50px;
            text-align: center;
            box-shadow: 5px 0 5px 4px #444;
        }
        .logo{
            margin-top:4px
        }
        </style>
    </head>
    <body>
        <div class="fixedtop">
            <p style="font-size: 23px; font-weight:bold" id="timerView"></p>
		</div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="fixed">
        cdcnklnkl
        </div>
        <div class="body">
           <?php echo $disp; ?> 
        </div>
        
        <script src="Admin/assets/js/jquery-1.9.0.min.js"></script>
        <script src="Admin/assets/js/timer.js" async defer></script>
    </body>
</html>
