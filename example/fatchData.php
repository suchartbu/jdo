<?php

/**
 * Testing fatch data from AS400 DB2 with JDBC.
 * 
 * PHP Version 7
 * 
 * @category  Jdo
 * @package   Example
 * @author    suchart bunhachirat <suchartbu@gmail.com>
 * @copyright 2019 Suchart Bunhachirat
 */
require '../vendor/autoload.php';

$sql = "SELECT * FROM jdbc_test WHERE id = 0";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/ttrpf";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->query($sql);
print_r($query);
