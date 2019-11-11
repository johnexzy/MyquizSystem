<?php
    try{
        require '../sql/config.php';
        if ($_GET) {
            $constName = $_GET['Name'];
            $constNumber = $_GET['Number'];
            // $tag = $_GET['tag'];
            $insert = $DBcon->prepare("INSERT INTO contestants (constName, constNumber) values(:constName, :constNumber)");
            // $insert->bindParam(':tag', $tag);
            $insert->bindParam(':constName', $constName);
            $insert->bindParam(':constNumber', $constNumber);
            if($insert->execute()){
               $msg = 'succesfully added '.$constName; 
            }
            else $msg = 'internal error occured, please contact the WebAdmin';
            echo $msg;
           
        }else
        {
            echo "error";
        }
    }
    catch(PDOException $e){
        echo "error" .$e->getMessage();
    }
    
?>