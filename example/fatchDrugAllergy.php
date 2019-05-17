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

$keys = ['hn' => '1542144'];
/**
 * ตรวจสอบค่า และสร้างเงื่อนไขการคัดข้อมูล
 */
$sql = 'SELECT "REGALGV5PF"."RAGHN" "hn", "PRDMASV5PF"."PRDPRDNAM" "drug_name", "PHATABV5PF"."PTBTABNAM" "phamaco_name", "GNCTABV5PF"."GTBGNCNAM" "generic_name", "REGALGV5PF"."RAGREMARK" "description", ( 25000000 + "RAGSECDTE" ) - 5430000 "update_date" FROM { oj "TRHPFV5"."REGALGV5PF" "REGALGV5PF" LEFT OUTER JOIN "TRHPFV5"."PRDMASV5PF" "PRDMASV5PF" ON "REGALGV5PF"."RAGPRDNO" = "PRDMASV5PF"."PRDPRDNO" LEFT OUTER JOIN "TRHPFV5"."GNCTABV5PF" "GNCTABV5PF" ON "REGALGV5PF"."RAGGENCOD" = "GNCTABV5PF"."GTBGNCCOD" LEFT OUTER JOIN "TRHPFV5"."PHATABV5PF" "PHATABV5PF" ON "REGALGV5PF"."RAGPHARMA1" = "PHATABV5PF"."PTBTABCOD1" AND "REGALGV5PF"."RAGPHARMA2" = "PHATABV5PF"."PTBTABCOD2" AND "REGALGV5PF"."RAGPHARMA3" = "PHATABV5PF"."PTBTABCOD3" } WHERE ';
if (!is_null($keys['hn'])) {
    $sql .= '"REGALGV5PF"."RAGHN" = ' . $keys['hn'];
} else {
    $sql .= '"REGALGV5PF"."RAGHN" = 0';
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
