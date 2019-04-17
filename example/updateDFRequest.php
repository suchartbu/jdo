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
$url = "jdbc:as400://10.1.99.2/TRHPFV5";
$jdo = new Orr\Jdo($user, $passwd, $url);
$key_ipsrqov5pf = ['IRQDOCNO' => "DF00000001" , 'IRQDOCDTE' => "25620417"];
$data_ipsrqov5pf = ['IRQDRFAMT' => "99.15",'IRQSECNAM' => "ITUP", 'IRQSECDTE' => "620417", 'IRQHLDFLG'=>""];
$jdo->update("IPSRQOV5PF", $data_ipsrqov5pf, $key_ipsrqov5pf);
