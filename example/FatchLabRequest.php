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
$cur_thdate = date("Ymd") + 5430000;
$sql = 'SELECT DISTINCT "LABRQOV5PF"."LRQDOCNO" "document_id", "LABRQOV5PF"."LRQIOPD" "visit_status", "LABRQOV5PF"."LRQVN" "vn", "LABRQOV5PF"."LRQVNSEQ" "vn_seq", "LABRQOV5PF"."LRQAN" "an", "LABRQDV5PF"."LRDHN" "hn", "LRQRQODTE" - 5430000 "request_date", "LRQRQOTIM" * 100 "request_time", "LABRQOV5PF"."LRQRQODR" "request_doctor_id", "LABRQDV5PF"."LRDLABTYP" "request_lab_type", "LABRQDV5PF"."LRDLABCOD" "request_lab_id", "LABRQOV5PF"."LRQFILNO" "file_no", "LRQCFMDTE" - 5430000 "checkin_date", "LRQCFMTIM" * 100 "checkin_time", "LABRQOV5PF"."LRQFODDTE" "eat_thdate", \'\' "eat_date", "LRQFODTIM" * 100 "eat_time", NOW( ) "update_time" FROM "TRHPFV5"."LABRQOV5PF" "LABRQOV5PF", "TRHPFV5"."LABRQDV5PF" "LABRQDV5PF" WHERE "LABRQOV5PF"."LRQDOCNO" = "LABRQDV5PF"."LRDDOCNO" AND "LABRQOV5PF"."LRQFILNO" > \'0\'';
if (!is_null($keys['hn'])) {
    $sql .= ' AND "LABRQDV5PF"."LRDHN" = \'' . $keys['hn'] . '\'';
} else {
    $sql .= ' AND "LABRQOV5PF"."LRQRQODTE" = ' . $cur_thdate;
}
$user = "it";
$passwd = "it";
$url = "jdbc:as400://10.1.99.2/trhpfv5";
$jdo = new Orr\Jdo($user, $passwd, $url);
$query = $jdo->query($sql);

print_r($query);
