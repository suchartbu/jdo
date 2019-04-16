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

$sql = "INSERT INTO jdbc_test(id,name) VALUES('26','ข้อความนี้มาจากการทดสอบการเพิ่มข้อมูล insertDate.php')";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/ttrpf";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->exec($sql);
print_r($query);
