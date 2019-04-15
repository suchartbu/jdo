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

use Jdo\Jdo as Jdo;

//$sql = "SELECT * FROM jdbc_test WHERE id > 0";
$sql = "INSERT INTO jdbc_test(id,name) VALUES('26','ข้อความนี้มาจากการทดสอบ updataDate.php')";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/ttrpf";
$jdo = new Jdo($user, $passwd, $url);
$query = $jdo->update($sql);
print_r($query);
