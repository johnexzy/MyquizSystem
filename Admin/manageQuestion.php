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
            <legend><b>SETUP QUESTIONS</b></legend>
            <div style="">
                <a href='#'><input type="button" onclick="alert('This feature is still in the making \n Coming Soon. Writing Some Logistics on it. Manage Round 2 instead')" value="MANAGE ROUND 1" /></a><b>| |</b>
                <a href='round2/'><input type="button" value="MANAGE ROUND 2" /></a><b>| |</b>
                <a href='#'><input onclick="alert('Coming Soon. Writing Some Logistics on it.')" type="button" value="MANAGE ROUND 3" /></a><b>| |</b>
            </div
        </fieldset>
    </body>
</html>
