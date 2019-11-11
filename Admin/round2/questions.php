<?php 
if (isset($_POST['addquest'])) {
    require '../../sql/dbconnect.php';
    $body = $DBcon->real_escape_string($_POST['body']);
    $OptionA = $DBcon->real_escape_string($_POST['OptionA']);
    $OptionB = $DBcon->real_escape_string($_POST['OptionB']);
    $OptionC = $DBcon->real_escape_string($_POST['OptionC']);
    $OptionD = $DBcon->real_escape_string($_POST['OptionD']);
    $CorrectAns = $DBcon->real_escape_string($_POST['CorrectOption']);


      $sql = "INSERT INTO `questionround2` (`question`, `optionA`, `optionB`, `optionC`, `optionD`, `CorrectAns`) VALUES ('$body', '$OptionA',  '$OptionB', '$OptionC', '$OptionD', '$CorrectAns')";

            if ($DBcon->query($sql) === true) {
               $mssg = "<div class='alert alert-success'>
        <span class='pe-7s-info'></span> &nbsp; Question added !
      </div>";
            }
            else {
                $mssg = "<div class'alert alert-danger'><span class='pe-7s-info'></span> &nbsp; error registering Question!
    </div>";
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
        <title>Questions</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../assets/css/profile.css" >
    </head>
    <body>
        <form action="" enctype="multipart/form-data" method="POST">
            <div style="text-align: center">
                QUESTION WIZARD - Create A question
            </div>
            <div class="carol-large">
                <div >
                    <section id="access" style=" border:2px solid; padding:2px; display:block;">                        
                        <input type="button" value="Underline" id="underline">|
                        <input type="button" value="italics" id="italics">|
                        <input type="button" value="bold" id="bold">|
                        <input type="button" value="Color" id="color">
                        <input type="button" value="Insert Image by Link" id="imgins">
                    </section>
                    
                </div>
                <div style="">
                    <textarea class="msg-large"  placeholder='Write Question here' name='body' id="textarea"></textarea><br>
                    
                    <b style="display: block">OPTIONS</b>
                    (1)<input type="text" class="myoption" name="OptionA"><br>
                    (2)<input type="text" class="myoption" name="OptionB"><br>
                    (3)<input type="text" class="myoption" name="OptionC"><br>
                    (4)<input type="text" class="myoption" name="OptionD"><br>
                    (CORRECT ANSWER)<input type="text" class="myoption" name="CorrectOption"><b style="color:red">* *</b>
                 <input type='submit' name='addquest' class='send-large' value='CREATE'>
                </div>
                <div style="float: right">
                    <p>PREVIEW</p>
                </div>
            </div>
            <script type="text/javascript" src="../assets/js/textfield.js"></script>
        </form>
        
        <section class='container'>
            <div class="col-lg-11">
              <?php
                require '../../sql/config.php';
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
                echo $disp;
                ?>  
            </div>
        </section>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
    </body>
</html>