<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ROUND 2 questions</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Admin/assets/css/style.css">
        <link rel="stylesheet" href="Admin/assets/css/profile.css" >
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section class='container'>
            <div class="col-lg-11">
              <?php
                require 'sql/config.php';
                $query = "SELECT * FROM `questionround2` \n" . " ORDER BY `id` DESC";
                $stmt = $DBcon->prepare( $query );
                $disp = "";
                $nums=1;
                if($stmt->execute()){
                    while($row=$stmt->fetch(PDO::FETCH_BOTH)){
                        $disp .= "<div class='container-mains'>";
                        $disp .= "<p>Question <b>$nums</b></p><hr>";
                        $disp .= "<p>Question: $row[2]</p><hr>";
                        $disp .= "<p>A: $row[3]</p>";
                        $disp .= "<p>B: $row[4]</p>";
                        $disp .= "<p>C: $row[5]</p>";
                        $disp .= "<p>D: $row[6]</p>";
                        $disp .= "</div>";
                        $nums += 1;
                    }
                }
                echo $disp;
                ?>  
            </div>
        </section>
        <script src="" async defer></script>
    </body>
</html>