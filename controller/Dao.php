<?php

require_once 'DataBase.php';

class Dao extends DataBase
{

    public $db;
    public $INSERT_INTO="INSERT INTO visits(ip_address) VALUES (?)";
    public $SELECT_BY_IP="SELECT * FROM visits WHERE ip_address=?";
    public $SELECT_ALL="SELECT * FROM visits";

    public function __construct()
    {
        $this->db = DataBase::getInstance();
        $this->db = self::getConnection();
    }

    public function insertInto($id){
        $stmt = $this->db->prepare($this->INSERT_INTO);
        $stmt->bindValue(1,$id);
        $stmt->execute();
    }

    public function selectByIp($ip){
        $stmt = $this->db->prepare($this->SELECT_BY_IP);
        $stmt->bindValue(1,$ip);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function selectAll(){
        $stmt = $this->db->prepare($this->SELECT_ALL);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}