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
require_once '../src/Jdo.php';

//use Jdo\Jdo as Jdo;

//$keys = ['id' => 'ท2525'];
$keys = ['id' => '3edhat'];
$sql = 'SELECT "TUSUSRNAM" "name", "TUSSTFNO" "staff_id", "TUSDRCOD" "doctor_id" FROM "TRHPFV5"."TABUSRV5PF" "TABUSRV5PF" WHERE "TUSACTFLG" = \' \' ';
if (!is_null($keys['id'])) {
    $sql .= 'AND "TUSUSRCOD" = \'' . strtoupper($keys['id']) . '\'';
} else {
    $sql .= 'AND "TUSUSRCOD" = \'\'';
}
$user = "it";
$passwd = "it";
$url = "jdbc:as400://10.1.99.2/trhpfv5";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->query($sql);

print_r($query);
echo $sql;
