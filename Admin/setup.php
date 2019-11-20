<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width"/>
        <title></title>
        <style>
        input{
            margin:10px;
            width:300px;
            height: 35px;
            border-radius:10px;
            background: #3b5990;
            color: #fff;
            font-weight: bold;
            font-family: sans serif
        }
        input:hover{
            background: #3b5960;
            border-radius:10px

        }
        input:focus{
            background: #3b5960
        }
        fieldset{
            border-radius:20px;
            border: 2px solid;
            text-align: center;
            box-shadow: 0px 2px 1px 0px
        }
        </style>
    </head>
    <body>
        <?php

        ?>
        <div>
            <fieldset>
                <legend><b>QUIZ SETUP</b></legend>
                <div style="">
                    <a href='contestant.php'><input type="button" value="ADD CONTESTANTS" /></a><br>
                    <a href='manageQuestion.php'><input type="button" value="SETUP QUESTIONS" /></a><br>
                    <a href='manageQuiz.php'><input type="button" value="MANAGE QUIZ" /></a>
                </div>
            </fieldset>
            <p><a href="<?php echo($_SERVER['HTTP_REFERER']) ?>">GO BACK</a></p>
        </div>
    </body>
</html>
