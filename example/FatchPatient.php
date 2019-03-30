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

//$sql = "SELECT rmshnref AS hn, rmsname AS fname, rmssurnam AS lname FROM regmasv5pf WHERE rmshnref = 365656";
//$sql = "SELECT * FROM regmasv5pf WHERE rmshnref = 365656";
//$sql = "SELECT ID___00001 FROM prefix ";
//$sql = "SELECT id FROM test WHERE id=3015";
//$sql = 'SELECT "REGMASV5PF"."RMSHNREF" "hn", "PREFIX"."NAME" "prefix", TRIM ( "REGMASV5PF"."RMSNAME" ) "fname", TRIM ( "REGMASV5PF"."RMSSURNAM" ) "lname", "REGMASV5PF"."RMSSEX" "sex", ( "RMSBTHYY" - 543 ) * 10000 + ( "RMSBTHMM" * 100 ) + "RMSBTHDD" "birthday_date", "REGMASV5PF"."RMSIDNO" "idcard" FROM "TRHPFV5"."REGMASV5PF" "REGMASV5PF", "TRHPFV5"."PREFIX2" "PREFIX" WHERE "REGMASV5PF"."RMSPRENAM" = "PREFIX"."ID" AND "REGMASV5PF"."RMSHNREF" = \'302938\'';
$hn = '460028';
$sql = 'SELECT "REGMASV5PF"."RMSHNREF" "hn", "PREFIX"."NAME" "prefix", TRIM ( "REGMASV5PF"."RMSNAME" ) "fname", TRIM ( "REGMASV5PF"."RMSSURNAM" ) "lname", "REGMASV5PF"."RMSSEX" "sex", ( "RMSBTHYY" - 543 ) * 10000 + ( "RMSBTHMM" * 100 ) + "RMSBTHDD" "birthday_date", "REGMASV5PF"."RMSIDNO" "idcard" FROM "TRHPFV5"."REGMASV5PF" "REGMASV5PF", "TRHPFV5"."PREFIX2" "PREFIX" WHERE "REGMASV5PF"."RMSPRENAM" = "PREFIX"."ID"';
$sql .= ' AND "REGMASV5PF"."RMSHNREF" = \'' . $hn . '\'';
$user = "it";
$passwd = "it";
$url = "jdbc:as400://10.1.99.2/trhpfv5";
$jdo = new Jdo($user, $passwd, $url);
$query = $jdo->query($sql);

print_r($query);
