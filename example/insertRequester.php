<?php
/**
 * Testing update data to AS400 DB2 with JDBC.
 * 
 * PHP Version 7
 * 
 * @category  Jdo
 * @package   Example
 * @author    suchart bunhachirat <suchartbu@gmail.com>
 * @copyright 2019 Suchart Bunhachirat
 */
require_once '../src/Jdo.php';

$sql = "INSERT INTO TABUSRV5PF(TUSUSRCOD,TUSUSRNAM,TUSDIVCOD) VALUES('3219IT','ทดสอบเพิ่ม Request insertRequest.php','IT')";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/TRHPFV5";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->exec($sql);
print_r($query);
