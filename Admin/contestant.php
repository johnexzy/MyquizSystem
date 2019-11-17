
<?php     

require '../sql/config.php';
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width"/>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <title>ADMIN&mdash;LOGIN</title>
  <style type="text/css">
    body{
            background: url('assets/img/full-screen-image-3.jpg');
            background-repeat: no-repeat;
            background-clip: content-box;
            background-position: 50%;
            background-size: 100% 100%;
            background-origin: content-box;
        }
        .input{
            width: 85%;
            border: 0;
            padding: 15px 15px 15px 0px;
            border-bottom: 2px solid #000 !important;
            border-radius: 2px;
            background: transparent
        }
        .alert{
          color:rgb(209, 8, 8);
          text-align:center;
        }
        .alert-success{
          color:blue;
          text-align:center;
        }
   </style>
</head>
<body>
  <div>
    <form name='myform' action="" method="GET" >
        <fieldset class="myfield" >
            <legend><img src="assets/img/myimage.png" class="myfield-legend"></legend>
  
          <center>
          <div style="text-align:center">
              <u>REGISTERED CONTESTANTS</u>
              
              <?php
                $querycomment = "SELECT * FROM contestants";
                $st = $DBcon->prepare($querycomment);
                $st->execute();
                $showupdate = "";
                $showupdate .= "<div style='text-align:left'><ul id='registeredUsers'>";
                $num = 0;
                while($corow=$st->fetch(PDO::FETCH_ASSOC)){
                  $num += 1;
                    $showupdate .="<li style='list-style-type:none'>
                    ".$num.". <b>CONTESTANT NO: $corow[constNumber] | Name: $corow[constName] </b>
                                    </li>";
                }
                if ($num == 0) {
                  $showupdate .= "<b>No registered Contestants Yet. Please Add</b>";
                }
                $showupdate .= "	</ul></div>";
                echo $showupdate;
            ?>
          </div>
            <font style="text-align: center; text-transform: uppercase" ><u>ADD CONTESTANTS</u></font>
              <?php 
                if (isset($msg)) {
                      echo $msg;
                } 
              ?>
            <div class="dropper-form" style="margin-top: 50px">
              <!-- <label for="name">USERNAME:  </label> -->
              <input class="input" type="text" id="constname" name="constname" value="" style=""  placeholder="CONTESTANT'S NAMES"><br>
              <!-- <label for="password">PASSWORD:  </label> -->
              <input class="input" value="" type="number" name="constnumber"  style="margin-top: 10px" placeholder="CONTESTANT's NO. e.g 1"><br>
              <input type="button" class="login-btn-small" id="btn-login" value="ADD USER" onclick="addUser()">
              <!-- <p>OR</p>
              <a href="create_account.php"><button class="login-btn-small-fade" type="button">Create Account</button></a> -->
            </div>
          </center>
      </fieldset>
    </form>
    <hr>
  </div>
    <script src="assets/js/addUser.js"></script>
</body>
</html>