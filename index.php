
<?php     

require_once 'sql/dbconnect.php';
session_start();
if (isset($_SESSION['userSession'])) {
  header("Location: home.php");
  exit;
}
//POST METHOD IMPORTANT
if (isset($_POST['btn-login'])) {
 
  $uname = $DBcon->real_escape_string($_POST['constname']);
  $number = intval($_POST['constnumber']);
  if($number !== null && $number !== '' && $uname !== '' && $uname !== null){
    $query = $DBcon->query("SELECT * FROM contestants WHERE constName = '$uname'");
    $row=$query->fetch_array();
    
    $count = $query->num_rows; // if email/password are correct returns must be 1 row
    if($row['constNumber'] == $number && $count==1) {
        //create a session if user succesfully logged in.
        //This session would help keep users and their details ontrack through the rounds
        $_SESSION['userSession'] = $row['constNumber'];
        header("Location: home.php");
    } 
    else {
      $msg =  "<h3 style='color:rgb(209, 8, 8);text-align:center;'>You're not a Contestant.</h3>";
    }
  }
  else{
    $msg = "<h3 style='color:rgb(209, 8, 8);text-align:center;'>Empty fields!!.</h3>";
  }
  
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name='veiwport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
  <link rel="stylesheet" type="text/css" href="Admin/assets/css/style.css">
  <title>ADMIN&mdash;LOGIN</title>
  <style type="text/css">
    body{
            background: url('Admin/assets/img/full-screen-image-3.jpg');
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
    <form name='myform' action="index.php" method="POST" >
        <fieldset class="myfield" >
            <legend><img src="Admin/assets/face-0.jpg" class="myfield-legend" width='100px' height='100px'></legend>
  
          <center>
            <font style="text-align: center; text-transform: uppercase" ><u>USER LOGIN PAGE</u></font>
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
              <input type="submit" class="login-btn-small" name="btn-login" value="LOGIN">
            </div>
          </center>
      </fieldset>
    </form>
    <hr>
    
  </div>
</body>
</html>
