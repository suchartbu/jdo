<?php

namespace orr;

if (defined('BASEPATH')) {
    /**
     * require_once(APPPATH . 'models/Jdb_ttrpf.php');
     */
} else {
    exit('No direct script access allowed');
}
class JDOException extends \Exception{}
/**
 * JAVA Database Objects
 * @author suchart bunhachirat
 */
class JDO {

    private $ModelsPath = '/var/www/html/HIS/jar/models/';
    private $LibrariesPath = '/var/www/html/HIS/jar/libraries/';
    private $dbUrl = NULL;
    private $dbUser = NULL;
    private $dbPasswd = NULL;
    private $Json = NULL;

    /**
     * 
     * @param type $user
     * @param type $passwd
     * @param type $url
     */
    public function __construct($user, $passwd, $url) {
        putenv('LANG=en_US.UTF-8');
        $this->dbUrl = $url;
        $this->dbUser = $user;
        $this->dbPasswd = $passwd;
    }

    /**
     * JDO::query
     * @param string $sql
     * @return array 
     */
    public function query($sql) {
        $this->execQuery($sql);
        return ($this->isQueryOk()) ? $this->Json['data'] : FALSE;
    }

    public function getRowsArray() {
        
    }

    public function isQueryOk() {
        return ($this->Json['execute'] === 'successed') ? TRUE : FALSE;
    }

    public function getJson() {
        return $this->Json;
    }

    private function execQuery($sql) {
        $output = NULL;
        try {
            $file_path = 'java -cp ' . $this->LibrariesPath . '*:' . $this->ModelsPath . 'jdb.jar execQuery ' . '"' . $sql . '" ' . '"' . $this->dbUser . '" ' . '"' . $this->dbPasswd . '" ' . '"' . $this->dbUrl . '" ';
            exec($file_path, $output);
            $this->Json = json_decode($output[0], TRUE);
            if($this->Json['execute'] === 'failed'){
                throw new JDOException($this->Json['info']);
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            
        }
    }

}
