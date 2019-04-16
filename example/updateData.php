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

$sql = "UPDATE jdbc_test SET name = 'ข้อความนี้มาจากการทดสอบแก้ไขข้อมูล updataDate.php' WHERE id = 26";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/ttrpf";
$jdo = new Orr\Jdo($user, $passwd, $url);
$keys = ['id' => "26"];
$data = ['name' => "ข้อความนี้มาจากการทดสอบแก้ไขข้อมูล updataDate.php"];
$jdo->update('jdbc_test', $data, $keys);
