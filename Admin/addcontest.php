<?php
    try{
        require '../sql/config.php';
        if ($_GET) {
            $constName = $_GET['Name'];
            $constNumber = $_GET['Number'];
            $tableName = $constName.$constNumber;
            // $tag = $_GET['tag'];
            $insert = $DBcon->prepare(
                "INSERT INTO contestants (constName, constNumber) values(:constName, :constNumber)"
            );
            // $insert->bindParam(':tag', $tag);
            $insert->bindParam(':constName', $constName);
            $insert->bindParam(':constNumber', $constNumber);
            if($insert->execute()){
               $msg = 'succesfully added '.$constName; 
               $Create = $DBcon->prepare(
                   "CREATE TABLE `myquizdb`.`$tableName` ( 
                       `id` INT(11) NOT NULL AUTO_INCREMENT , 
                       `question_id` INT(255) NOT NULL , 
                       `answer` VARCHAR(255) NULL , 
                       `correctAnswer` VARCHAR(255) NULL ,
                       `grade` BOOLEAN NULL, 
                       PRIMARY KEY (`id`)) ENGINE = InnoDB;"
                );
                if(!$Create->execute()) $msg = 'User cant write this test. Contact Web Admin';
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