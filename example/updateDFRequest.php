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
$table = "IPSRQOV5PF";
$keys = ['IRQDOCNO' => "DF00000001" , 'IRQDOCDTE' => "25620416"];
$data = ['IRQDRFAMT' => "99.15",'IRQSECNAM' => "ITUP", 'IRQSECDTE' => "620416"];
$cols = array();
foreach ($data as $key => $val) {
    $cols[] = "$key = '$val'";
}
foreach ($keys as $key => $val) {
    $where[] = "$key = '$val'";
}
$sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE " . implode(' AND ', $where);
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/TRHPFV5";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->exec($sql);
print_r($query);
echo $sql;
