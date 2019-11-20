<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Management</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <h3>
        "Some Questions Might require images for illustrations, especially in subjects/courses related to science<br /> To enable simplicity when using this images, they're required to be uploaded, then you only make use of the image links. <br> With that you can place them at any position of your choice. please kindly watch the video provided in the manual, or read the documentation fully."
            
        </h3>
        <h2 style="text-align:center">
            HOW TO ADD QUESTIONS
        </h2>
        <p>For Question that require images, you'll need to write these questions with MS WORD, convert them to a PDF file. Here you can cut out the questions in the form of images, and then get them uploaded. <br> Click <a href="uploadWizard.php"><b>Here</b></a> to upload images <p>
        <p>Click <a href="questions.php"><b>Here</b></a> to Add Question</p>
        <br>
        <br>
        <fieldset>
            <legend><b>CHANGE THE TIME ALLOWED:</b></legend>  
            <table border="1" cellpadding="10" cellspacing="5">
                <th>Minutes</th><th>Seconds</th>
                <tr>
                    <td><input type="number" name="" id="minutes" maxlength="3" style="width:50px"></td>
                    <td><input type="number" name="" id="seconds" max="3" style="width:50px" ></td>
                </tr>
            </table>
            <br>
            <input type="button" value="Change" id="change"  style="width:180px; height:30px">
        </fieldset>
        <script>
            document.getElementById("change").addEventListener("click", function(){
                var id = document.getElementById.bind(document);
                minutes = id("minutes").value;
                seconds = id("seconds").value;
                var updateRequest;
                try {
                    updateRequest = new XMLHttpRequest();
                } catch (e) {
                    try {
                        updateRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            updateRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            alert("Your browser broke");
                            return false;
                        }
                    }
                }
                updateRequest.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        alert(this.responseText);
                    }
                };
                var updateString = "?minutes="+minutes+"&seconds="+seconds;
                //send query to _checkPermission.php
                updateRequest.open("GET", "time.php" + updateString, true);
                updateRequest.send(null);
            });
        </script>
    </body>
</html>