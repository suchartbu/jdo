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

$keys = ['hn' => '365656'];
/**
 * ตรวจสอบค่า และสร้างเงื่อนไขการคัดข้อมูล
 */
$sql = 'SELECT "BILTRDV5PF"."BTDHN" "hn", "BTDDOCDTE" - 5430000 "document_date", "DRMASV5PF"."DMSDRCOD" "doctor_id", CONCAT( TRIM ( "DMSPRENAM" ), CONCAT( TRIM ( "DMSNAME" ), CONCAT( \' \', TRIM ( "DMSNAME" ) ) ) ) "doctor_name", "BILTRMV5PF"."BTMIOPD" "visit_status", TRIM ( "PRDPRDNO" ) "drug_id", TRIM ( "PRDPRDNAM" ) "drug_trade_name", "BILTRDV5PF"."BTDISSQTY" "quantity", TRIM ( CONCAT( TRIM ( "BTDMTHNAM" ), CONCAT( \' \', CONCAT( TRIM ( "BTDQTYNAM" ), CONCAT( \' \', TRIM ( "BTDUNTNAM" ) ) ) ) ) ) "discription_1", TRIM ( CONCAT( TRIM ( "BTDTIMNAM1" ), CONCAT( \' \', TRIM ( "BTDTIMNAM2" ) ) ) ) "discription_2", TRIM ( CONCAT( TRIM ( "BTDWRNNAM1" ), CONCAT( \' \', CONCAT( TRIM ( "BTDWRNNAM2" ), CONCAT( \' \', TRIM ( "BTDWRNNAM3" ) ) ) ) ) ) "discription_3", "BTMVN1" * 100 + "BTMVN2" "vn", "BILTRMV5PF"."BTMAN" "an", "BILTRMV5PF"."BTMDOCNO" "document_id" FROM { oj "TRHPFV5"."DRMASV5PF" "DRMASV5PF" RIGHT OUTER JOIN "TRHPFV5"."BILTRMV5PF" "BILTRMV5PF" ON "DRMASV5PF"."DMSDRCOD" = "BILTRMV5PF"."BTMDRCOD" }, "TRHPFV5"."BILTRDV5PF" "BILTRDV5PF", "TRHPFV5"."PRDMASV5PF" "PRDMASV5PF" WHERE "BILTRMV5PF"."BTMDOCNO" = "BILTRDV5PF"."BTDDOCNO" AND "BILTRMV5PF"."BTMHN" = "BILTRDV5PF"."BTDHN" AND "PRDMASV5PF"."PRDPRDNO" = "BILTRDV5PF"."BTDPRDNO" AND "BILTRDV5PF"."BTDISSQTY" > 0';
if (!is_null($keys['hn'])) {
    $sql .= ' AND "BILTRDV5PF"."BTDHN" = ' . $keys['hn'] . ' ORDER BY "document_date" DESC, "document_id" DESC ';
} else {
    $sql .= ' AND "BILTRDV5PF"."BTDHN" = 0';
}
/**
 * กำหนดค่าสำหรับการเชื่อมต่อฐานข้อมูล
 */
//$user = "it";
//$passwd = "it";
//$url = "jdbc:as400://10.1.99.2/trhpfv5";
//$jdo = new Jdo($user, $passwd, $url);
$jdo = new Orr\Jdo('orrconn', 'xoylfk', 'jdbc:as400://10.1.99.2/trhpfv5');
$query = $jdo->query($sql);

print_r($query);
echo $sql;
