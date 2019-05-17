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

//$sql = "SELECT * FROM IPSRQOV5PF WHERE IRQDOCNO = 'DF00000001'";
$sql = "SELECT * FROM IPSRQOV5PF WHERE IRQDOCNO LIKE '19%'";
$user = "orrconn";
$passwd = "xoylfk";
$url = "jdbc:as400://10.1.99.2/TRHPFV5";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->query($sql);
print_r($query);
