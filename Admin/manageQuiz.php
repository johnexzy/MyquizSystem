<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            background: #3b5960
        }
        input:focus{
            background: #3b5960;
            border-radius:10px
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
    <fieldset>
        <legend><b>MANAGE QUIZ</b></legend>
        <a href=""><input type="button" value="APPROVE TEST"></a>
        <a href="../checkresult.html"><input type="button" value="VIEW RESULT OF TEST"></a>
    </fieldset>
    edit the time allowed <br>
    edit the checkmode <br>
    truncate the data in the Questions table <br>
    edit question
</body>
</html>