<?php
    require 'sql/dbconnect.php';
      $query = $DBcon->query("SELECT * FROM contestants");
      $data = "";
        while($row=$query->fetch_array()){
            $contestant =  $row['constName'].$row['id']; // This variable targets the Username. e.g will9
            $queryRes = $DBcon->query("SELECT * FROM $contestant");
            $resCount = 1;
            $score = 0;
            $data .= "<fieldset>
                        <legend style='font-size:22px'><b>$row[constName]</b></legend>";
            while ($rowRes = $queryRes->fetch_array()) {
                //echo "||````$rowRes[id]`````||```$rowRes[1]````||```$rowRes[2]````||```$rowRes[3]````||```$rowRes[4]````|\n";
                $getQuestion = $DBcon->query("SELECT * FROM `questionround2` WHERE `questionround2`.`id` = $rowRes[1]");
                $getQues = $getQuestion->fetch_array();
                $A = ($rowRes[2] == "") ? "NO RESPONSE" : $rowRes[2]; //Answer
                $B = $rowRes[3]; //CorrectAnswer
                // $C = $getQues[5];
                // $D = $getQues[6];
                // $E = $getQues[7]; //correct option. indexed by numbers
                $score += intval($rowRes[4]);
                $data .= "
                            <div class='container-mains'>
                                <p>Question <b>$resCount</b></p><hr>
                                <p>Question: $getQues[2]</p><hr>
                                <p><b>RESPONSE:</b> ".($A .= ($A == $B) ? '&nbsp;&nbsp;&nbsp; <img src="Admin/assets/img/good.png" width="30px">' : '<img src="Admin/assets/img/bad.png" width="30px">')."</p>
                                
                            </div>
                        ";
                $resCount += 1;
            }
            $data .= "  <p style='color:blue'>SCORE: <b>$score</b></p>
                    </fieldset>
                    <br>
                    <hr>";
        }
        echo $data;
?>