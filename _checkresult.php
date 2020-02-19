<?php
    require 'sql/dbconnect.php';
    $query = $DBcon->query("SELECT * FROM contestants");
    $data = "";
    while($row=$query->fetch_array()){
        $contestant =  $row['constName'].$row['id']; // This variable targets the Username. e.g will9
        $queryRes = $DBcon->query("SELECT * FROM $contestant");//query a particular user
        $resCount = 0; //result count set to 1
        $score = 0;
        $data .= "<fieldset>
                    <legend style='font-size:22px'><b>$row[constName]</b></legend>";
        while ($rowRes=$queryRes->fetch_assoc()) {
            /*
            $rowRes[1] == question_id    (this will be used to fetch the questions from the question table) 
            $rowRes[2] == answer from user
            $rowRes[3] == correctAnswer
            $rowRes[4] == grade = ($rowRes[2]==$rowRes[3]) ? 1 : 0
            */
            $getQuestion = $DBcon->query("SELECT * FROM `questionround2` WHERE `questionround2`.`id` = $rowRes[question_id]");
            $getQues = $getQuestion->fetch_assoc();
            $A = ($rowRes['answer'] == "") ? "NO RESPONSE" : $rowRes['answer']; //Answer
            $B = $rowRes['correctAnswer']; //CorrectAnswer
            // $C = $getQues[5];
            // $D = $getQues[6];
            // $E = $getQues[7]; //correct option. indexed by numbers
            $score += intval($rowRes['grade']); //Accumulate Contestants Score
            $data .= "
                        <div class='container-mains'>
                            <p>Question <b>$resCount</b></p><hr>
                            <p>Question: $getQues[question]</p><hr>
                            <p><b>RESPONSE:</b> "
                            .($A .= ($A == $B) ? '&nbsp;&nbsp;&nbsp; 
                            <img src="Admin/assets/img/good.png" width="30px">' 
                            : '<img src="Admin/assets/img/bad.png" width="30px">')."</p>
                        </div>
                    ";
            $resCount += 1;
        }
        if ($resCount == 0) {
            $data .= "<p style='color:red'>NO DATA YET!!</b></p>
                </fieldset>
                <br>
                <hr>";
        }else{
            $scoreInpercent = (($score/$resCount)*100);
            $scoreInpercent = ($scoreInpercent == 70) ? "<b style='color:gold'>$scoreInpercent%</b>":
            ($scoreInpercent >= 60) ? "<b style='color:brown'>$scoreInpercent%</b>":
            ($scoreInpercent >= 50)?"<b style='color:blue'>$scoreInpercent%</b>":
            ($scoreInpercent >= 45)?"<b style='color:black'>$scoreInpercent%</b>":
            "<b style='color:red'>$scoreInpercent%</b>";
            $data .= "  <p style='fontweight:900'>SCORE: <b>".$scoreInpercent."</b></p>
                    </fieldset>
                    <br>
                    <hr>";
        }
    }
    echo $data;
?>