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

use Jdo\Jdo as Jdo;

$keys = ['hn' => '460028','div_id'=>'DP1'];
$cur_thdate = date("Ymd") + 5430000;
$sql = 'SELECT "OPDAPPV5PF"."OAPREGDTE" "visit_thdate", "OAPREGDTE" - 5430000 "visit_date","OAPFRMTIM" * 100 AS "visit_time", "OPDAPPV5PF"."OAPHN" "hn", "OAPVN" * 100 + "OAPSEQNO" "vn", "OPDAPPV5PF"."OAPDIVCOD" "div_id", RTRIM( "RTBTABNAM" ) "div_name", "OPDAPPV5PF"."OAPDRCOD" "doctor_id", RTRIM( "DMSPRENAM" ) "doctor_prefix", RTRIM( "DMSNAME" ) "doctor_fname", RTRIM( "DMSSURNAM" ) "doctor_lname", "DRMASV5PF"."DMSSEX" "doctor_sex", "OPDAPPV5PF"."OAPCRDSTS" "card_status" FROM "TRHPFV5"."OPDAPPV5PF" "OPDAPPV5PF", "TRHPFV5"."DRMASV5PF" "DRMASV5PF", "TRHPFV5"."REGTABV5PF" "REGTABV5PF" WHERE "OPDAPPV5PF"."OAPDRCOD" = "DRMASV5PF"."DMSDRCOD" AND "OPDAPPV5PF"."OAPDIVCOD" = "REGTABV5PF"."RTBTABCOD"  AND "REGTABV5PF"."RTBTABTYP" = \'01\' ';
if (!is_null($keys['hn']) AND ! is_null($keys['div_id'])) {
    $sql .= 'AND "OPDAPPV5PF"."OAPHN" = \'' . $keys['hn'] . '\' AND "OPDAPPV5PF"."OAPREGDTE" = ' . $cur_thdate . ' AND "OPDAPPV5PF"."OAPDIVCOD" = \'' . $keys['div_id'] . '\'';
} else if (!is_null($keys['hn'])) {
    $sql .= 'AND "OPDAPPV5PF"."OAPHN" = \'' . $keys['hn'] . '\'';
} else {
    $sql .= 'AND "OPDAPPV5PF"."OAPREGDTE" = ' . $cur_thdate;
}
$user = "it";
$passwd = "it";
$url = "jdbc:as400://10.1.99.2/trhpfv5";
$jdo = new Jdo($user, $passwd, $url);
$query = $jdo->query($sql);

print_r($query);
