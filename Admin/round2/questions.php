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
               $mssg = "<div style='background: green;'>
        <span class='pe-7s-info'></span> &nbsp; Question added Succesfully. Click <a href='../../round2questions.php' target='_blank'>Here</a> to view all Added Question for Round 2 !
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
            <?php if (isset($mssg)) {
                echo $mssg;
            } ?>
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
                    
                    <p style="font-size: 22px; text-transform: uppercase">copy image link Here</p>
                        <textarea name="" id="ImgPasteUrl"  style="border:2px solid; border-radius: 5px; width: 45%; height:81px;margin-top: -10px" readonly="readonly"></textarea>

                    <b style="display: block">OPTIONS</b>
                    (1)<input type="text" class="myoption" name="OptionA"><button type="button" id="useImg">USE IMAGE?</button><br>
                    (2)<input type="text" class="myoption" name="OptionB"><button type="button" id="useImga">USE IMAGE?</button><br>
                    (3)<input type="text" class="myoption" name="OptionC"><button type="button" id="useImgb">USE IMAGE?</button><br>
                    (4)<input type="text" class="myoption" name="OptionD"><button type="button" id="useImgc">USE IMAGE?</button><br>
                    (CORRECT ANSWER)<input type="text" class="myoption" placeholder="Write The Answer in full" name="CorrectOption"><b style="color:red">* *</b>
                    
                 <input type='submit' name='addquest' class='send-large' value='CREATE'>
                </div>
                <div style="">
                    <p>PREVIEW ADDED QUESTIONS <a href="../../round2questions.php" target="_blank">HERE</a></p> 
                </div>
            </div>
           
        </form>
        <div style="text-align:center; padding:30px">
        <b style="font-size:24px;">ALL UPLOADS</b> <br>
        </div>
        <section>
            <?php
                require "../../sql/config.php";
                $query = "SELECT * FROM `uploads`  \n" . " ORDER BY `id` DESC";
                $stmt = $DBcon->prepare( $query );
                $stmt->execute();
                $display_res = "<div class=''>";
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $display_res .= "
                                        
                                            <img src='uploads/$row[url]' style='width:130px; height:130px; margin:5px; display:inline; border:2px solid'>
                                        
                                    ";
                }
                $display_res .= "</div>";
                echo $display_res;
            ?>
        </section>
    </div>
        

        <script src="../assets/js/jquery.3.2.1.min.js"></script>
        <script>
            
            $(document).ready(function(){
                
                $("#useImg, #useImga, #useImgb, #useImgc").click(function(){
                    $("#imgins").click();
                })
            })
        </script> 
        <script type="text/javascript" src="../assets/js/textfield.js"></script>
        
    </body>
</html>