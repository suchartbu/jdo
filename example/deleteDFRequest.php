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
$idx_ = ['document_id' => "DF00000001", 'document_thdate' => "25620417"];
$key_ipsrqov5pf = ['IRQDOCNO' => $idx_['document_id'] , 'IRQDOCDTE' => $idx_['document_thdate']];
$jdo->delete("IPSRQOV5PF", $key_ipsrqov5pf);
$key_ipsrqdv5pf = ['IRDDOCNO' => $idx_['document_id'] , 'IRDDOCDTE' => $idx_['document_thdate']];
$jdo->delete("IPSRQDV5PF", $key_ipsrqdv5pf);
$key_obldetv5pf = ['OBDDOCNO' => $idx_['document_id'] , 'OBDDOCDTE' => $idx_['document_thdate']];
$jdo->delete("OBLDETV5PF", $key_obldetv5pf);
$jdo->delete("OBLDETTMPF", $key_obldetv5pf);