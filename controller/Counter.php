<?php

require_once 'Dao.php';

class Counter extends Dao
{
    public $ip;
    public $dao;

    public function __construct()
    {
        $this->dao=new Dao();
    }

    public function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }

        return $this->ip;
    }

    public function count(){
        $visits=$this->dao->selectByIp($this->getIp());
        if (empty($visits)){
            $this->dao->insertInto($this->getIp());
        }
    }

    public function visits(){
        $no=$this->dao->selectAll();
        return count($no);
    }
}