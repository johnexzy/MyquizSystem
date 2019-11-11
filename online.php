<?php
include 'session.php';
echo $conRow[1]; //array indexed by number
require 'sql/config.php';
$query = "SELECT * FROM `questionround2` \n" . " ORDER BY `id` DESC";
$stmt = $DBcon->prepare( $query );
$disp = "";
if($stmt->execute()){
    while($row=$stmt->fetch(PDO::FETCH_BOTH)){
        $disp .= "<div class='container-mains'>";
        $disp .= "<p>Question id is $row[0]</p>";
        $disp .= "<p>Question: $row[2]</p>";
        $disp .= "<p>A: $row[3]</p>";
        $disp .= "<p>B: $row[4]</p>";
        $disp .= "<p>C: $row[5]</p>";
        $disp .= "<p>D: $row[6]</p>";
        $disp .= "</div>";

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
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php echo $disp; ?>
        <script src="" async defer></script>
    </body>
</html>
