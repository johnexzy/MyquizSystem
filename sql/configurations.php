<?php
/* This file should be executed first, before everyother
 * This is the configuration of all databases needed.
 * @author Oba John Obinna.
 */

    require 'env.php';
    $database = 'phpmyadmin';
    $DBcon = new PDO("mysql:host=$sever;dbname=$database", $username, $dbpass);
    $sql = "CREATE DATABASE IF NOT EXISTS `myquizdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
    USE `myquizdb`;
    
    CREATE TABLE IF NOT EXISTS `questionround2` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `image` varchar(255),
      `question` text NOT NULL,
      `number` text NOT NULL,
      `optionA` text NOT NULL,
      `optionB` text NOT NULL,
      `optionC` text NOT NULL,
      `optionD` text NOT NULL,
      `CorrectAns` text NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

    CREATE TABLE IF NOT EXISTS `contestants` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `constName` varchar(255) NOT NULL,
      `constNumber` int(11) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

    ";
    $stmt = $DBcon->prepare($sql);
    if($stmt->execute()){
      echo "succesfull";
    }else echo "Operation failed!";
?>
