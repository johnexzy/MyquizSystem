<?php
require_once "../../sql/dbconnect.php";
if (isset($_POST['Upload'])) {    
    extract($_POST);
    //make sure file type is image
    $extensions = array("jpeg", "jpg", "png", "gif");
    foreach ($_FILES['uploaditem']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['uploaditem']['name'][$key];
        $file_tmp =$_FILES['uploaditem']['tmp_name'][$key];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if(in_array($file_ext, $extensions)){
            if (!file_exists("uploads/".$file_name)) {
                
                $query = "INSERT INTO `uploads` (`url`) VALUES ('$file_name')";
                if($DBcon->query($query) == true){
                    move_uploaded_file($file_tmp, "uploads/".$file_name);
                    echo "<div class='alert alert-success'> &nbsp; Succesfully added ".$file_name."!
                  </div>";
                }else{
                    echo "<div class='alert alert-danger'><br>
                    Internal Error Occured </div>";
                }
            }else{
                echo "<br><div class='alert alert-danger'><b>".$file_name."<b> Alreday exist. it was skipped</div>";
            }
        }
    }
    $DBcon->close();
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
        <title>UPLOAD WIZARD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/profile.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="../assets/js/jquery.3.2.1.min.js"></script>
    </head>
    <body>
    <div class="container">
    <h3 class="h2" style="text-align:center">
    UPLOAD WIZARD
    </h3>
        <section style="width:96%; border:2px dashed; border-radius:23px;margin: auto; padding-bottom:30px">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card" id="touch" style="background:#88888875; width:45%; height:200px; margin:60px auto; text-align:center;box-shadow:1px 1px 9px 2px;border-radius:20px">
                <p>CLICK HERE TO UPLOAD IMAGES</p>
                    <span class="glyphicon glyphicon-upload" style="margin-top:50px; font-size:24px;color:blue"></span>
                </div>
                <input type="file" name="uploaditem[]" id="upload" accept="image/*" multiple />
                <input type="submit" value="UPLOAD" class="send-large" name="Upload">
            </form>
            
        </section>
        <hr>
        <div style="text-align:center">
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
        
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="../assets/js/imgselect.js" async defer></script>
    </body>
</html>