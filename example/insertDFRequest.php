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
$data = ['IRQDOCDTE' => "25620416" , 'IRQDOCNO' => "DF00000001" , 'IRQDOCTIM' => "8", 'IRQIOPD' => "O", 'IRQHN' => "460028", 'IRQVN' => "1", 'IRQVNSEQ' => "1", 'IRQRQODIV' => "IT", 'IRQRQODR' => "ITIT", 'IRQRQOUSR' => "ITIT", 'IRQDRCOD' => "ITIT", 'IRQDRFAMT' => "0", 'IRQSTSFLG' => "2", 'IRQHLDFLG'=>"2", 'IRQCONTYP'=>"1", 'IRQCONCOD' => "", 'IRQSECNAM' => "ITIT", 'IRQSECDTE' => "620416"];
$jdo->insert("IPSRQOV5PF", $data);
