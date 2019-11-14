<?php
include 'session.php';
echo $conRow[1]; //array indexed by number
require 'sql/config.php';
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
                    <button type='submit' name='submitAnswer' >SUBMIT</button>
                </div>
              ";
    $disp .= "</form>";
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
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <input type="radio" name="option" id=""><label for="option"></label>
        <?php echo $disp; ?>
        <script src="" async defer></script>
    </body>
</html>
