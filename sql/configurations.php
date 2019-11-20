<?php
/* This file should be executed first, before everyother
 * This is the configuration of all databases needed.
 * @author Oba John Obinna.
 */

    require 'env.php';
    $DBcon = new PDO("mysql:host=$sever;dbname=$database", $username, $dbpass);
    $sql = "CREATE TABLE IF NOT EXISTS `questionround2` (
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
    
    
    CREATE TABLE IF NOT EXISTS `controls` (
      `id` int(11) NOT NULL,
      `minutes` int(6) NOT NULL,
      `seconds` int(11) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
    INSERT INTO `controls` (`id`, `minutes`, `seconds`) VALUES
    (1, 2, 0);
    CREATE TABLE IF NOT EXISTS `uploads` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `url` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

    CREATE TABLE IF NOT EXISTS `_checkmode1` (
      `id` int(11) NOT NULL,
      `mode` tinyint(1) NOT NULL DEFAULT '0',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
    
    CREATE TABLE IF NOT EXISTS `_checkmode2` (
      `id` int(11) NOT NULL,
      `mode` tinyint(1) NOT NULL DEFAULT '1',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
    INSERT INTO `_checkmode2` (`id`, `mode`) VALUES
    (1, 1);
    CREATE TABLE IF NOT EXISTS `_checkmode3` (
      `id` int(11) NOT NULL,
      `mode` tinyint(1) NOT NULL DEFAULT '0',
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;
    ";
    $stmt = $DBcon->prepare($sql);
    if($stmt->execute()){
      echo "succesfull";
    }else echo "Operation failed!";
?>
