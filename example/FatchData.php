<?php
require_once '../src/Jdo.php';
use Orr\Jdo as Jdo;
$sql = "SELECT * FROM jdbc_test WHERE id > 0";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/ttrpf";
$jdo = new Jdo($user, $passwd, $url);
$query = $jdo->query($sql);
print_r($query);
