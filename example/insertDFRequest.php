<?php

/**
 * ทดสอบเพิ่มค่าแพทย์ HN 460028 
 * - document_id(string 10) : หมายเลขเอกสาร DF + [RUNING NUMBER] เป็นคีย์หลักเพื่อตรวจสอบแก้ไขข้อมูล
 * - hn (bigint) : หมายเลขประจำตัวผู้ป่วย
 * - vn (int) : ลำดับที่รับบริการผู้ป่วยนอก
 * - vn_seq (int 2) : ลำดับการเข้ารับบริการตามจุดของผู้ป่วย
 * - requester_id (string 6) : รหัสผู้บันทึกข้อมูล
 * - charge_id (string) : ประเภทรายไ้ด้
 * - receipt_id (string) : ลำดับใบเสร็จ
 * - df_charge_id (string) : ประเภทรายไ้ด้แพทย์
 * - df_receipt_id (string) : ลำดับใบเสร็จ
 * - ips_id (string 2) : รหัสประเภทค่าแพทย์
 * - doctor_id (string 5) : รหัสแพทย์
 * - df_price (currency 6) : ค่าธรรมเนียมแพทย์
 * - df_quantity (int) : ค่าเริ่มต้น 1 (ไม่ส่งก็ได้)
 * - div_id (string 3) : รหัสหน่วยงาน
 * - contract_type (string) : ประเภทคู่สัญญามาจาก VN. (ไม่ส่งก็ได้)
 * - contract_code (string) : รหัสคู่สัญญามาจาก VN. (ไม่ส่งก็ได้)
 * - program_id () : รหัสโปรแกรมค่าเริ่มต้นเป็น DFRpcS (ไม่ส่งก็ได้)
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
$cur_thdate = date("Ymd") + 5430000;
$cur_time = date("Hi");
$idx_ = ['document_id' => "DF00000001", 'document_thdate' => $cur_thdate, 'document_time' => $cur_time, 'hn' => "460028",
    'vn' => "0001", 'vn_seq' => "02", 'requester_id' => "ITIT", 'charge_id' => "2", 'receipt_id' => "35", 'df_charge_id' => "900", 'df_receipt_id' => "35",
    'ips_id' => "01", 'doctor_id' => "1104", 'df_price' => "123456", 'df_quantity' => "1", 'div_id' => "O10", 'contract_type' => "1",
    'contract_code' => " ", 'program_id' => "DFRequest"];
$idx_['hims_thdate'] = substr($idx_['document_thdate'], 2);
$data_ipsrqov5pf = ['IRQDOCDTE' => $idx_['document_thdate'], 'IRQDOCNO' => $idx_['document_id'], 'IRQDOCTIM' => $idx_['document_time'], 'IRQIOPD' => "O", 'IRQHN' => $idx_['hn'], 'IRQVN' => $idx_['vn'], 'IRQVNSEQ' => $idx_['vn_seq'], 'IRQRQODIV' => $idx_['div_id'], 'IRQRQODR' => $idx_['doctor_id'], 'IRQRQOUSR' => $idx_['requester_id'], 'IRQDRCOD' => $idx_['doctor_id'], 'IRQDRFAMT' => $idx_['df_price'] * $idx_['df_quantity'], 'IRQSTSFLG' => "2", 'IRQHLDFLG' => "", 'IRQCONTYP' => $idx_['contract_type'], 'IRQCONCOD' => $idx_['contract_code'], 'IRQSECNAM' => $idx_['requester_id'], 'IRQSECDTE' => "620416"];
$jdo->insert("IPSRQOV5PF", $data_ipsrqov5pf);
$data_ipsrqdv5pf = ['IRDDOCDTE' => $idx_['document_thdate'], 'IRDDOCNO' => $idx_['document_id'], 'IRDIPSTYP' => "DF", 'IRDIPSCOD' => $idx_['ips_id'], 'IRDTOTAMT' => $idx_['df_price'] * $idx_['df_quantity'], 'IRDDRFAMT' => $idx_['df_price'], 'IRDIPSQTY' => $idx_['df_quantity'], 'IRDSECNAM' => $idx_['requester_id'], 'IRDSECDTE' => $idx_['hims_thdate'], 'IRDSECTIM' => $idx_['document_time'], 'IRDHN' => $idx_['hn'], 'IRDSECPGM' => $idx_['program_id'], 'IRDMECCOD' => $idx_['doctor_id'], 'IRDCFMDTE' => $idx_['document_thdate']];
$jdo->insert("IPSRQDV5PF", $data_ipsrqdv5pf);
/**
 * DF21 : charge_id , receipt_id
 */
$data_obldetv5pf_df = ['OBDDOCDTE' => $idx_['document_thdate'], 'OBDDOCTIM' => $idx_['document_time'], 'OBDDOCTYP' => "12", 'OBDDOCNO' => $idx_['document_id'], 'OBDHN' => $idx_['hn'], 'OBDVN' => $idx_['hims_thdate'] . $idx_['vn'] . $idx_['vn_seq'], 'OBDRCPCOD' => $idx_['receipt_id'], 'OBDCHRCOD' => $idx_['charge_id'], 'OBDPRDNO' => "DF" . $idx_['ips_id'], 'OBDDIVCOD' => $idx_['div_id'], 'OBDTOTQTY' => $idx_['df_quantity'], 'OBDPRDUP' => "0", 'OBDTOTAMT' => "0", 'OBDPAYAMT' => "0", 'OBDDRFLG' => "", 'OBDDRCOD' => $idx_['doctor_id'], 'OBDDRMOD' => "", 'OBDRQODIV' => $idx_['div_id'], 'OBDRQODR' => $idx_['doctor_id'], 'OBDCONTYP' => $idx_['contract_type'], 'OBDCONCOD' => $idx_['contract_code'], 'OBDSECNAM' => $idx_['requester_id'], 'OBDSECDTE' => $idx_['hims_thdate'], 'OBDSECTIM' => $idx_['document_time'], 'OBDSECPGM' => $idx_['program_id'], 'OBDSECNAML' => $idx_['doctor_id'], 'OBDSECDTEL' => $idx_['hims_thdate'], 'OBDSECTIML' => $idx_['document_time']];
$jdo->insert("OBLDETV5PF", $data_obldetv5pf_df);
$jdo->insert("OBLDETTMPF", $data_obldetv5pf_df);
/**
 * DF21.D : df_charge_id , df_receipt_id
 */
$data_obldetv5pf_dfd = ['OBDDOCDTE' => $idx_['document_thdate'], 'OBDDOCTIM' => $idx_['document_time'], 'OBDDOCTYP' => "12", 'OBDDOCNO' => $idx_['document_id'], 'OBDHN' => $idx_['hn'], 'OBDVN' => $idx_['hims_thdate'] . $idx_['vn'] . $idx_['vn_seq'], 'OBDRCPCOD' => $idx_['df_receipt_id'], 'OBDCHRCOD' => $idx_['df_charge_id'], 'OBDPRDNO' => "DF" . $idx_['ips_id'] . ".D", 'OBDDIVCOD' => $idx_['div_id'], 'OBDTOTQTY' => $idx_['df_quantity'], 'OBDPRDUP' => $idx_['df_price'], 'OBDTOTAMT' => $idx_['df_price'] * $idx_['df_quantity'], 'OBDPAYAMT' => "0", 'OBDDRFLG' => "1", 'OBDDRCOD' => $idx_['doctor_id'], 'OBDDRMOD' => "1", 'OBDRQODIV' => $idx_['div_id'], 'OBDRQODR' => $idx_['doctor_id'], 'OBDCONTYP' => $idx_['contract_type'], 'OBDCONCOD' => $idx_['contract_code'], 'OBDSECNAM' => $idx_['requester_id'], 'OBDSECDTE' => $idx_['hims_thdate'], 'OBDSECTIM' => $idx_['document_time'], 'OBDSECPGM' => $idx_['program_id'], 'OBDSECNAML' => $idx_['doctor_id'], 'OBDSECDTEL' => $idx_['hims_thdate'], 'OBDSECTIML' => $idx_['document_time']];
$jdo->insert("OBLDETV5PF", $data_obldetv5pf_dfd);
$jdo->insert("OBLDETTMPF", $data_obldetv5pf_dfd);
