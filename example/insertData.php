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

$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/ttrpf";
$jdo = new Orr\Jdo($user, $passwd, $url);
$table = "jdbc_test";
$data = ['id' => "27", 'name' => "ข้อความนี้มาจากการทดสอบการเพิ่มข้อมูล insertDate.php"];

try {
    $jdo->insert($table, $data);
} catch (Exception $ex) {
    echo $ex->getMessage();
}


