<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Testing fatch of Drug data.
 * PHP Version 7
 * 
 * @category  Jdo
 * @package   Example
 * @author    suchart bunhachirat <suchartbu@gmail.com>
 * @copyright 2019 Suchart Bunhachirat
 */
require_once '../src/Jdo.php';

$keys = ['is_sync' => TRUE];
/**
 * ตรวจสอบค่า และสร้างเงื่อนไขการคัดข้อมูล
 */
$sql = 'SELECT "PRDPRDNO" "id", "PRDPRDNAM" "trade_name", "PRDGNCNAM" "general_name" FROM "TRHPFV5"."PRDMASV5PF" "PRDMASV5PF" WHERE "PRDPRDTYP" = \'M\' ';
if (!$keys['is_sync']) {
    $sql .= 'AND  "PRDPRDNO" = \'\'';
}
/**
 * กำหนดค่าสำหรับการเชื่อมต่อฐานข้อมูล
 */
echo $sql . "\n";
$jdo = new \Orr\Jdo('orrconn', 'xoylfk', 'jdbc:as400://10.1.99.2/trhpfv5');
$query = $jdo->query($sql);

print_r($query);

