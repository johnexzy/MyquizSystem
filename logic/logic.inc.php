<?php
    require '../session.php';
    require '../sql/config.php';
    if(isset($_POST['submitAnswer'])){
        $query = "SELECT * FROM `questionround2` \n" . " ORDER BY `id` DESC";
        $stmt = $DBcon->prepare( $query );
        if($stmt->execute()){
            $nums = 0;//count total Question
            $numOK = 0;//count correctly Answered Question
            while($row=$stmt->fetch(PDO::FETCH_BOTH)){
                $nums += 1; //increment by 1
                $id = $row[0]; //indexed by both column name and number
                $question_id = $id;
                if (isset($_POST["$conRow[1]$row[0]"])) {
                    $answer = $_POST["$conRow[1]$row[0]"];
                }
                else{
                    $answer = "";
                }
                
                
                $queryQ = "SELECT * FROM `questionround2` WHERE id=:id";
                $queryStmt = $DBcon->prepare($queryQ);
                $queryStmt->execute(array(':id'=>$id));
                $rowQuest = $queryStmt->fetch(PDO::FETCH_BOTH);
                extract($rowQuest);
                $answer = strval($answer);
                $correctAnswer = strval($CorrectAns);

                if ($answer === $CorrectAns) {
                    $numOK += 1; //increment by 1, if correct
                    $grade = 1;
                }
                else{
                    $grade = 0;
                }
                $insertInfo = $DBcon->prepare(
                    "INSERT INTO $conRow[1]$conRow[2] (question_id, answer, correctAnswer, grade) values(:question_id, :answer, :correctAnswer, :grade)"
                );
                $insertInfo->bindParam(':question_id', $question_id);
                $insertInfo->bindParam(':answer', $answer);
                $insertInfo->bindParam(':correctAnswer', $correctAnswer);
                $insertInfo->bindParam(':grade', $grade);
                $insertInfo->execute();
            }
            echo " YOUR SCORE IS ".$numOK."/".$nums;
            exit;
                
           
        }
    }
?>