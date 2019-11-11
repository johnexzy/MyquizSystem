<?php
    require '../sql/config.php';
    $querydata = "SELECT * FROM contestants";
    $state = $DBcon->prepare($querydata);
    $state->execute();
    $disupdate = "";
    $num = 0;
    while($corow=$state->fetch(PDO::FETCH_ASSOC)){
        $num += 1;
        $disupdate .="<li>
                            ".$num.". <b>CONTESTANT NO: $corow[constNumber] | Name: $corow[constName] </b>
                        </li>";
    }
    if ($num == 0) {
        $disupdate .= "<b>No registered Contestants Yet. Please Add</b>";
    }
    $disupdate .= "";
    echo $disupdate;
?>